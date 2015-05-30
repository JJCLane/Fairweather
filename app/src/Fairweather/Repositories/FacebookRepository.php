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

	public function getPagePosts($limit = 5) {

		$request = new FacebookRequest($this->session, 'GET', '/' . $this->facebookPageId . '/posts?limit=' . $limit);
		$response = $request->execute();
		$graphObject = $response->getGraphObject();
		return $graphObject;
		
	}

	private function getObjects($objects) {

		$params = [];
		foreach ($objects as $object) {
			$param = [
				"method" => "GET",
				"relative_url" => "/" . $object['id']
			];
			array_push($params, $param);
		}

		$request = new FacebookRequest($this->session, 'POST', '?batch='.json_encode($params) );
		$response = $request->execute();
		$graphObject = $response->getGraphObject();

		$responseObjects = array();

		foreach($graphObject->asArray() as $responseObject){
			// Decode each response
			$responseObject = json_decode($responseObject->body, 1);

			// Loop through our current objects passing by reference
			foreach ($objects as &$object) {
				// Merge the arrays if the ids match
				if($object['id'] === $responseObject['id']) {
					$object = array_merge($object, $responseObject);
				}
			}

		}

		return $objects;
		
	}

	/**
	 * params
	 * $required = How many image ids are required to be returned
	 * $limit = The initial post request limit to optimistically speed Facebook API call up
	 */
	private function getPhotos($required, $limit = 5) {

		$posts = $this->getPagePosts($limit);

		$photos = array();

		foreach ($posts->getPropertyAsArray('data') as $post) {

			if($post->getProperty('type') === 'photo') {
				// Get the photo and store it in array
				$photo = Array();
				$photo['id'] = $post->getProperty('object_id');
				$photo['post_id'] = $this->parsePostId($post);
				$photo['message'] = $post->getProperty('message');
				$photo['updated_time'] = $post->getProperty('updated_time');
				// If the post is a story then we need to store the likes as most people like
				// the story and not the photo itself
				if(!is_null($post->getProperty('story'))) {
					$photo['likes'] = $post->getProperty('likes')->asArray();
				}
				array_push($photos, $photo);
			}
		}

		// Check if the call returned enough photos, if not repeat the requst with a bigger limit
		$count = count($photos);
		if($count < $required) {
			return $this->getPhotos($required, $limit + 5);
		} else if ($count > $required) {
			// If we have too many photos slice the required amount
			$photos = array_slice($photos, 0, $required);
		}

		$photos = $this->getObjects($photos);

		return $photos;

	}

	public function getPageStatusPhotos() {
		$photos = Cache::remember('facebook-photos', 20, function()
		{
			$photos = $this->getPhotos(3, 5);

		    return $photos;
		});

		return $photos;
	}

	private function parsePostId($post) {
		$id = $post->getProperty('id');
		// Find the position of the underscore
		$underscorePos = strpos($id, "_");
		// Remove the page id including the underscore to get post id
		$postId = substr($id, $underscorePos + 1);

		return $postId;

	}



}