<?php
use Fairweather\Repository;

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

	public function getIndex()
	{
			
		$facebookRepository = App::make('Fairweather\Repositories\FacebookRepository');

		$data = array();
		$data['photos'] = $facebookRepository->getPageStatusPhotos();
		$data['facebookPageId'] = Config::get('services.facebook.pageId');
		return View::make('home', $data);
	}

}
