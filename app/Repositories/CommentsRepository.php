<?php

namespace App\Repositories;

use Response;
use Validator;
use App\Models\Comments;

class CommentsRepository extends BaseRepository {

    public function __construct(Comments $comments) {
        $this->model = $comments;
    }

    /**
     * Возвращает комментарии
     * @param null $request
     * @return mixed
     */
    public function getComments($request = null) {
        $comments = $this->model
            ->select('id', 'commentable_id', 'commentable_type', 'status', 'content', 'name', 'email');

        if(!empty($request['object_id']) && is_array($request['object_id'])) {
            $comments->where('object_id', '=', $request['object_id']);
        }

        if(!empty($request['object_type']) && is_array($request['object_type'])) {
            $comments->where('object_type', '=', $request['object_type']);
        }

        if(!empty($request['status']) && is_array($request['status'])) {
            $comments->where('status', '=', $request['status']);
        }

        return $comments->get();
    }

    /**
     * @param null $request
     * @param int $limit
     * @return mixed
     */
    public function getCommentsByPage($request = null, $limit = 20) {

        $comments = $this->model->select('id', 'commentable_id', 'commentable_type', 'status', 'content', 'name', 'email');

        $comments = $this->makeCondition($comments, $request);

        $comments->orderBy('created_at', 'desc');

        return $comments->paginate($limit);
    }

    /**
     * @param $inputs
     * @return bool
     */
    public function addComment($inputs) {
        $commentable_type = $inputs['commentable_type'];
        $commentable_id = $inputs['commentable_id'];

        if (empty($commentable_type) || empty($commentable_id)) {
            return false;
        }

        $model = "\\App\\Models\\{$commentable_type}";
        $object = new $model();

        $item = $object->find($commentable_id);

        $comment = $this->model;

        $comment->content   = $inputs['content'];
        $comment->name      = !empty($inputs['name']) ? $inputs['name'] : 'Гость';
        $comment->email     = $inputs['email'];

        try {
            $item->comments()->save($comment);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

        return Response::json(['item' => $comment], 201);
    }

    private function validate() {

    }

    /**
     * Метод сохранения
     * @param $item
     * @param $inputs
     * @return mixed
     */
    public function save($item, $inputs) {

        //$item->title             = $inputs['title'];
        //$item->is_special        = $inputs['is_special'];
        $item->content           = $inputs['content'];
        $item->name              = $inputs['name'];
        $item->email             = $inputs['email'];
        $item->status            = $inputs['status'];

        try {
            $item->save();

        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

        return Response::json(['item' => $item], 201);
    }

    /**
     * Одобрение
     * @param $item
     * @return mixed
     */
    public function approve($item) {

        $item->status = 1;

        try {
            $item->save();
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }
        return Response::json(['item' => true], 200);
    }
}