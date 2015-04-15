<?php
/*
*
* Shortener for Craft - Shortener Service
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/craft-shortener
*
*/
namespace Craft;

class ShortenerService extends BaseApplicationComponent
{

	public function shorten($url)
	{
		//First, grab the URL to use as a cachekey
		$cache_key = 'shortener_'.urlencode($url);

		//Get the cache, if it exists
		$cache = craft()->cache->get($cache_key);

		$return = "";

		//If cache doesn't exist, do Bitly API call
		if(! $cache )
		{
			if($url)
			{
				$settings = craft()->plugins->getPlugin('shortener')->getSettings();
		   
				$endpoint = "https://api-ssl.bitly.com/v3/shorten";

				$domain = "";
				//Check for custom domain
				if($settings->customDomain != '')
				{
					$domain = $settings->customDomain;
				} else {
					$domain = $settings->domain;
				}

				//Query parameters (http://dev.bitly.com/links.html#v3_shorten)
			    $params = array(
			    	'domain' => $domain,
			    	'format' => 'json',
			    	'longUrl' => $url,
			    	'access_token' => $settings->token
			    );

			    //Set up Guzzle client for get request
				$client = new \Guzzle\Http\Client();
				$request = $client->createRequest('GET', $endpoint);
				
				//Add query variables to request
				$query = $request->getQuery();
				foreach($params as $key=>$val)
				{
					$query->set($key, $val);
				}

				//Send request
				$result = $request->send();

				//If request is good, move forward
				//If not, return false. Anytime after this, if something isn't right, return given url as a fallback
				if($result->getStatusCode() == 200)
				{
					$response = $result->json();

					//If Bitly Response code is good
					if($response['status_code'] == 200)
					{
						$return = $response['data']['url'];
					} else {
						$return = $url;
					}
				} else {
					$return = $url;
				}
			} else {
				$return = false;
			}

			//Cache new response
			craft()->cache->set($cache_key, $return, $settings->cacheTime);
		} else {
			//If chaced, return cached result
			$return = $cache;
		}
		//Return shortened URL or given URL
		return $return;
	}
}