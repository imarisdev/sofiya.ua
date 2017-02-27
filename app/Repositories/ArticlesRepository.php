<?php
namespace App\Repositories;

use Response;
use App\Models\Articles;

class ArticlesRepository extends BaseRepository {

    protected $image;

    private $types = [
        1 => 'Новости',
        2 => 'Акции'
    ];

    public function __construct(Articles $articles, ImageRepository $image) {

        $this->model = $articles;
        $this->image = $image;
    }

    /**
     * Список статей
     * @param null $request
     * @param int $limit
     * @return mixed
     */
    public function getArticles($request = null, $limit = 20) {

        $articles = $this->model;

        if(!empty($request['type'])) {
            $articles = $articles->where('type', '=', $request['type']);
        }

        return $articles->paginate($limit);

    }

    /**
     * Типы статей
     * @return array
     */
    public function getArticleTypes() {
        return $this->types;
    }

    /**
     * Метод сохранения
     * @param $user
     * @param $inputs
     * @return mixed
     */
    private function save($article, $inputs) {

        $article->title         = $inputs['title'];
        $article->type          = $inputs['type'];
        $article->description   = $inputs['description'];
        $article->content       = $inputs['content'];

        if(empty($inputs['slug'])) {
            $article->slug = $this->createSlug($inputs['title']);;
        }

        if(!empty($inputs['image'])) {
            $article->image = @serialize($this->image->uploadImage($inputs['image'][0]));
        }

        try {

            $article->save();

            return Response::json(['item' => $article], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

    /**
     * Обновление данных
     * @param $inputs
     */
    public function update($article, $inputs) {

        return $this->save($article, $inputs);

    }

    /**
     * Создание
     * @param $inputs
     */
    public function store($inputs) {

        return $this->save(new $this->model, $inputs);

    }

    /**
     * Удаление
     * @param $house
     */
    public function destroy($article) {

        try {

            $article->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

}