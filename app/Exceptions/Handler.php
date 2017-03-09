<?php

namespace App\Exceptions;

use App\Repositories\ComplexRepository;
use App\Repositories\OptionsRepository;
use View;
use Exception;
use Psr\Log\LoggerInterface;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected $log;

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    protected $complex;

    protected $options;

    /**
     * Create a new exception handler instance.
     *
     * @param  \Psr\Log\LoggerInterface  $log
     * @param $complex
     * @return void
     */
    public function __construct(LoggerInterface $log, ComplexRepository $complex, OptionsRepository $options)
    {
        parent::__construct($log);
        $this->log = $log;
        $this->complex = $complex;
        $this->options = $options;
    }

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e) {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e) {
        if ($this->isHttpException($e)) {
            return $this->renderHttpException($e);
        } else {
            return parent::render($request, $e);
        }
    }

    /**
     * Render the given HttpException.
     *
     * @param  \Symfony\Component\HttpKernel\Exception\HttpException $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderHttpException(HttpException $e) {

        $optionsList = [];

        foreach($this->options->getAllOptions() as $option) {
            $optionsList[$option['options_key']] = $option['options_value'];
        }

        view()->share(['options' => $optionsList]);
        view()->share(['current_complex' => null]);
        view()->share(['default_complex' => $this->complex->getById(1)]);
        view()->share(['complex_list' => []]);
        view()->share(['search_from' => []]);
        view()->share(['complex' => null]);

        if (view()->exists('errors.' . $e->getStatusCode())) {

            return response()->view('errors.' . $e->getStatusCode(), [], $e->getStatusCode());
        } else {
            return (new SymfonyDisplayer(config('app.debug')))->createResponse($e);
        }
    }
}
