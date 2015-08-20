<?php

use Vinelab\Http\Client as HttpClient;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function saveForm() {
		
		$client = new HttpClient;

		$name = Input::get('name');
		$mobile = Input::get('mobile');
		$email = Input::get('email');
		$message = Input::get('message');

		$request = [
        'url' => 'http://192.168.1.124/slimapi/insertUser',
            'params' => [
                'name' => $name,
                'mobile' => $mobile,
                'email' => $email,
                'message' => $message
            ]
        ];
        $response = $client->post($request);
        $data =  $response->content();
        echo $data;

	}

}
