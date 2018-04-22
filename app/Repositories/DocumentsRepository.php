<?php

namespace App\Repositories;

use Response;
use App\Models\Documents;

class DocumentsRepository extends BaseRepository {

    /**
     * @var ImageRepository
     */
    private $image;

    /**
     * DocumentsRepository constructor.
     * @param Documents $documents
     * @param ImageRepository $image
     */
    public function __construct(Documents $documents, ImageRepository $image) {
        $this->model = $documents;
        $this->image = $image;
    }

    public function saveDocument($inputs, $house_id, $house_title = null) {

        $document = new $this->model;

        $document->title    = isset($inputs['title']) ? $inputs['title'] : $house_title;
        $document->house_id = $house_id;
        $document->sort     = 1;

        if(!empty($inputs['image'])) {
            $document->image = @serialize($this->image->uploadImage($inputs['image'][0]));
        }

        try {
            $document->save();

            return Response::json(['item' => $document], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }
    }

    /**
     * Удаление
     * @param $house
     */
    public function destroy($document) {
        try {
            $document->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }
    }
}