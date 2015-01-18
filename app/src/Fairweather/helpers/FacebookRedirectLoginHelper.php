<?php
namespace Fairweather\Helpers;

use Session;

class FacebookRedirectLoginHelper extends \Facebook\FacebookRedirectLoginHelper
{
	protected function storeState($state)
	{
		Session::put('state', $state);
	}

	protected function loadState()
	{
		return $this->state = Session::get('state');
	}
}