<?php

/*
*
* Shortener for Craft - Main Plugin File
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/craft-shortener
*
*/

namespace Craft;

class ShortenerPlugin extends BasePlugin
{
	function getName()
	{
		return Craft::t('Shortener Plugin');
	}
	
	function getVersion()
	{
		return '1.0';
	}
	
	function getDeveloper()
	{
		return 'Aaron Berkowitz';
	}
	
	function getDeveloperUrl()
	{
		return 'https://github.com/aberkie';
	}

	protected function defineSettings()
	{
		return array(
			'token' => array(AttributeType::Mixed, 'default' => ''),
			'cacheTime' => array(AttributeType::Number, 'default' => 86400),
			'domain' => array(AttributeType::Mixed, 'default' => 'bit.ly')
		);
	}

	public function hookAddTwigExtension()
	{
	    Craft::import('plugins.shortener.twigextensions.ShortenerTwigExtension');
	    return new ShortenerTwigExtension();
	}

	public function getSettingsHtml()
	{
		return craft()->templates->render('shortener/settings', array(
			'settings' => $this->getSettings()
		));
	}

}