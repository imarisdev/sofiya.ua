<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\DocumentsRepository;
use Illuminate\Http\Request;

class DocumentsController extends AdminController {

    private $documents;

    public function __construct(DocumentsRepository $documents) {
        $this->documents = $documents;
    }

    /**
     * Удаление
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request) {
        $document = $this->documents->getById($request->get('id'));

        return $this->documents->destroy($document);
    }
}