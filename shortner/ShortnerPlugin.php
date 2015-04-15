<?php

/*
*
* Shortner for Craft - Main Plugin File
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/craft-shortner
*
*/

namespace Craft;

class ShortnerPlugin extends BasePlugin
{
	function getName()
	{
		return Craft::t('Shortner Plugin');
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
	    Craft::import('plugins.shortner.twigextensions.ShortnerTwigExtension');
	    return new ShortnerTwigExtension();
	}

	public function getSettingsHtml()
	{
		return craft()->templates->render('shortner/settings', array(
			'settings' => $this->getSettings()
		));
	}

}