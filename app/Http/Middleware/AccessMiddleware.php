<?php
namespace App\Http\Middleware;

use Auth;
use View;
use Closure;
use App\Repositories\AccessItemsRepository;

class AccessMiddleware {

    protected $access_items;

    public function __construct(AccessItemsRepository $access_items) {
        $this->access_items = $access_items;
    }

    public function handle($request, Closure $next) {

        if(!$this->checkAccess($request->route()->getAction())) {
            abort(403, 'Unauthorized action.');
        } else {
            return $next($request);
        }

    }

    /**
     * Проверка доступа для пользователя
     * @param $access_rule
     * @return bool
     */
    private function checkAccess($request) {

        $rule = $this->access_items->searchRule($request);

        foreach($rule->users as $user) {
            if($user->id == Auth::user()->id) {
                return true;
            }
        }

        return false;
    }

}