<?php

use Fairweather\Repository;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	
	$facebookRepository = App::make('Fairweather\Repositories\FacebookRepository');
	$photos = $facebookRepository->getPagePhotos();

	foreach ($photos->getPropertyAsArray('data') as $photo) {
		echo '<img src="' . $photo->getproperty('source') . '" />';
	}
	//return View::make('hello');
});
