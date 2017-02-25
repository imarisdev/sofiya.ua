<?php

namespace App\Http\Middleware;

use Closure;
use App\Repositories\RedirectsRepository;

class RedirectsMiddleware {

    protected $redirects;

    public function __construct(RedirectsRepository $redirects) {
        $this->redirects = $redirects;
    }

    public function handle($request, Closure $next) {

        $data = explode('?', $request->server('REQUEST_URI'));

        if(isset($data[1])) {
            $this->checkFirstPage($request, $data[1]);

            $redirect = $this->checkRedirect($data[0], $data[1]);
        } else {
            $redirect = $this->checkRedirect($data[0]);
        }

        if ($redirect) {
            header('Location: ' . $redirect->url_to, true, $redirect->code);
            die();
        }

        return $next($request);

    }

    /**
     * Редиректим со страницы ?page=1 на остновную
     * @param $request
     * @param $query
     */
    private function checkFirstPage($request, $query) {
        parse_str($query, $query);

        if(isset($query['page']) && $query['page'] == 1) {
            unset($query['page']);

            if(!empty($query)) {
                header('Location: ' . $request->url() . '?' . http_build_query($query), true, 301);
            } else {
                header('Location: ' . $request->url() . '', true, 301);
            }
            die();
        }
    }

    /**
     * Проверка ссылки
     * @param $url
     * @param $query
     * @return bool
     */
    private function checkRedirect($url, $query = null) {

        $redirect = $this->redirects->getNewUrl($url, $query);

        return $redirect;
    }
}