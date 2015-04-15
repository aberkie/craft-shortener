<?php

/*
*
* Shortener for Craft - Variable
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/craft-shortener
*
*/

namespace Craft;

class ShortenerVariable
{

	public function shorten($url)
	{
		$return = craft()->shortener->shorten($url);
		return $return;
	}
}