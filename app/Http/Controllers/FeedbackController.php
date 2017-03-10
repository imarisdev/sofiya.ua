<?php

namespace App\Http\Controllers;

use Validator;
use App\Repositories\OptionsRepository;
use Mail;
use Response;
use Illuminate\Http\Request;

class FeedbackController extends Controller {

    protected $options;

    public function __construct(OptionsRepository $options) {
        $this->options = $options;
    }


    public function send(Request $request) {

        try {

            $valid = $this->validateData($request->all());

            if($valid === true) {
                $email = $this->options->getValueByKey('form_email');

                if (!empty($email)) {
                    Mail::send('emails.feedback', ['data' => $request->all()], function ($m) use ($request, $email) {
                        $m->from('server@sofiya.ua', 'Sofiya.ua');
                        $m->to($email, $request->get('name', 'Гость'))->subject('Форма обратной связи');
                    });

                    return Response::json(['send' => true], 200);
                } else {
                    return Response::json(['error' => true, 'msg' => 'No email'], 400);
                }
            } else {
                return Response::json(['error' => true, 'msg' => $valid], 400);
            }
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => $e->getMessage()], 400);
        }
    }

    private function validateData($fields) {
        $validator = Validator::make($fields, [
            'name' => 'required|max:250|min:1',
            'phone' => 'required|max:250|min:1'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return true;
    }
}
