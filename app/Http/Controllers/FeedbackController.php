<?php

namespace App\Http\Controllers;

use Mail;
use Response;
use Illuminate\Http\Request;

class FeedbackController extends Controller {

    public function __construct() {

    }


    public function send(Request $request) {

        try {

            Mail::send('emails.feedback', ['data' => $request->all()], function ($m) use ($request) {
                $m->from('info@sofiya.ua', 'Sofiya.ua');
                $m->to('info@sofiya.ua', $request->get('name', 'Гость'))->subject('Форма обратной связи');
            });

            return Response::json(['send' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => $e->getMessage()], 400);
        }
    }
}