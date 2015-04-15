# Shortener
Craft CMS Plugin for shortening URLs with Bitly

##Bitly Generic Access Token
To use this plugin, you will need a bitly generic access token to authenticate your account. You can [get your token here](https://bitly.com/a/oauth_apps)!

Hey! Now that you have this fancy token, why don't you check out [Verbatim](http://verbat.im/) ([GitHub](https://github.com/nclud/verbatim-craft)) for deep linking content! 

##Install
1. Upload entire shortener directory to craft/plugins on your server.
2. Navigate to your site's Plugin settings from the Control Panel.
3. Click Install
 
##Settings
####Bitly Token

Required. You can [get your token here](https://bitly.com/a/oauth_apps).

####Cache Time In Seconds (Default is 1 day)

Required. Set a high cache time to increase performance. Default is `86400` for one day.

####Domain
Choose either bit.ly, j.mp, or bitly.com to use for your shortened URLs.

####Custom Short Domain
Optional. Enter your branded short domain that you have [registered with bitly](https://bitly.com/a/custom_domain_settings). Entering anything in this box will override the Domain setting above.

##Usage
Shortener can be used from any template or plugin. 

###Template Options
You have two options to use shortener from a template, as a Twig filter or as a plugin variable.

####Twig Filter
	{% set longUrl = 'https://buildwithcraft.com/' %}
	<p>Shortened Url: {{ longUrl|shorten }}</p>

####Plugin Variable
	{% set longUrl = 'https://buildwithcraft.com/' %}
	{% set shortUrl = craft.shortener.shorten(longUrl) %}
	
###From a Plugin
To call `shorten` from a different Craft plugin:

    $shortUrl = craft()->shortener->shorten($longUrl);


##Changelog

###1.1
* added custom domain field

###1.0
* initial release
