<?php

namespace App\Repositories;

use Response;
use App\Models\Redirects;

class RedirectsRepository extends BaseRepository {

    public function __construct(Redirects $redirects) {
        $this->model = $redirects;
    }

    /**
     * URL для перенаправления
     * @param $url_from
     * @param null $query
     * @return bool
     */
    public function getNewUrl($url_from, $query = null) {
        $url = $this->model->select('id', 'url_from', 'url_to', 'code')
            ->where(function ($where) use ($url_from, $query) {
                $where->where('url_from', '=', $url_from)
                        ->orWhere('url_from', '=', $url_from . '?' . $query);
            })
            ->orderBy('id', 'desc')
            ->first();

        if(!empty($url)) {
            return $url;
        } else {
            return false;
        }
    }

    /**
     * Список редиректов
     * @param null $request
     * @param int $limit
     * @param array $order
     * @return mixed
     */
    public function getRedirectsByPage($request = null, $limit = 20, $order = ['by' => 'created_at', 'mode' => 'desc']) {
        $redirects = $this->model->select('id', 'url_from', 'url_to', 'code', 'created_at');

        $redirects = $this->makeCondition($redirects, $request);

        $redirects->orderBy($order['by'], $order['mode']);

        return $redirects->paginate($limit);
    }

    /**
     * Метод сохранения
     * @param $item
     * @param $inputs
     * @return mixed
     */
    public function save($item, $inputs) {

        $item->url_from     = $inputs['url_from'];
        $item->url_to       = $inputs['url_to'];
        $item->code         = $inputs['code'];

        try {
            $item->save();
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

        return Response::json(['item' => $item], 201);
    }

    /**
     * Поиск
     * @param null $request
     * @param $limit
     */
    public function searchRedirects($request = null, $limit = 50) {
        $items = $this->model->select('id', 'url_from', 'url_to', 'code')
            ->where('url_from', 'like', "%{$request['title']}%")
            ->orWhere('url_to', 'like', "%{$request['title']}%")
            ->take($limit)
            ->orderBy('created_at', 'desc');

        return Response::json(['items' => $items->get()], 200);
    }

}