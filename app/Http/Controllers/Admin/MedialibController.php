<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\MedialibRepository;

class MedialibController extends AdminController {

    protected $medialib;

    public function __construct(MedialibRepository $medialib) {

        $this->medialib = $medialib;

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $medialib = $this->medialib->getById($request->get('id'));

        return $this->medialib->destroy($medialib);

    }

}