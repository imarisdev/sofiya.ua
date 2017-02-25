<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CommentsRepository;

class CommentsController extends Controller {

    protected $comments;

    public function __construct(CommentsRepository $comments) {
        $this->comments = $comments;
    }

    /**
     * @param Request $request
     */
    public function addComment(Request $request) {
        return $this->comments->addComment($request->all());
    }

}