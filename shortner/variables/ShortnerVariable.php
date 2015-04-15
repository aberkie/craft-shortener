<?php

/*
*
* Shortner for Craft - Variable
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/craft-shortner
*
*/

namespace Craft;

class ShortnerVariable
{

	public function shorten($url)
	{
		$return = craft()->shortner->shorten($url);
		return $return;
	}
}