<?php
namespace Fairweather\Repositories;

use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook;
use Fairweather\Helpers\FacebookRedirectLoginHelper;
use Cache;

class FacebookRepository {

	public $session;

	private $facebookAppId;

	private $facebookAppSecret;

	private $facebookPageId;

	public function __construct($pageId, $appId, $appSecret) {

		$this->facebookPageId = $pageId;
		$this->facebookAppId = $appId;
		$this->facebookAppSecret = $appSecret;

		FacebookSession::setDefaultApplication($this->facebookAppId, $this->facebookAppSecret);

		try {
			$this->session = new FacebookSession($this->facebookAppId . "|" . $this->facebookAppSecret);
		} catch(FacebookRequestException $ex) {
			// When Facebook returns an error
			//dd($ex);
		} catch(\Exception $ex) {
			// When validation fails or other local issues
			//dd($ex);
		}

	}

	public function getPagePhotos() {

		$photos = Cache::remember('facebook-pics', 1, function()
		{
			$request = new FacebookRequest($this->session, 'GET', '/' . $this->facebookPageId . '/photos');
			$response = $request->execute();
			$graphObject = $response->getGraphObject();
		    return $graphObject;
		});

		return $photos;
		
	}



}