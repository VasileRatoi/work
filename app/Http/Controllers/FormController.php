<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Log\Logger;
use App\Providers\FormServiceProvider;



class FormController extends Controller
{

    private $request;
    private $log;
    private $app;

    public function __construct(Request $request, Logger $log){
        $this->request = $request;
        $this->log = $log;
    }

    public function formRequest(){

        session()->forget('results');


        $validator = Validator::make($this->request->all(), [
            'name' => 'min:2',
            'email' => 'email',
            'message' => 'required|max:150'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->messages();
            session(['error' => 'Something wrong, please check if you entered the correct details.']);
            $this->log->error('Error', $errors);
        } else {
            $results = [
                $this->request->name,
                $this->request->email,
                $this->request->message
            ];

            session(['results' => $results]);
            $this->log->info('Dates are submited.');
        }

        FormServiceProvider::register();


        return redirect()->route('form')->withErrors($validator);
    }
}

