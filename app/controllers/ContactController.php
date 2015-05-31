<?php

class ContactController extends BaseController {

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

	public function postEnquiry()
	{

		$rules = array(
			'name' => 'required|min:2',
			'number' => 'required',
			'enquiry' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('/#contact-form')->withErrors($validator);
		}

		Mail::send('emails.enquiry', Input::all(), function($message)
		{
		    $message->to('fairweathergardenservices@hotmail.com', 'Lee Fairweather')->subject(Input::get('name'  . ' - Web enquiry'));
		    $message->to('jordanlane@hotmail.co.uk', 'Jordan Lane')->subject(Input::get('name'  . ' - Web enquiry'));

		    $message->from('enquiries@fairweathergardenservices.co.uk', 'Enquiries');

		});

		Session::flash('success', 'Thank you for contacting us, we\'ll be in touch shortly.');

		return Redirect::to('/#contact-form');
		
	}

}
