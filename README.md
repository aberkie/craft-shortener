# Shortner
Craft CMS Plugin for shortening URLs with Bitly

##Bitly Generic Access Token
To use this plugin, you will need a bitly generic access token to authenticate your account. You can [get your token here](https://bitly.com/a/oauth_apps)!

##Install
1. Upload entire shortner directory to craft/plugins on your server.
2. Navigate to your site's Plugin settings from the Control Panel.
3. Click Install
 
##Settings
####Bitly Token

Required. You can [get your token here](https://bitly.com/a/oauth_apps).

####Cache Time In Seconds (Default is 1 day)

Required. Set a high cache time to increase performance. Default is `86400` for one day.

####Domain
Requred. Choose either bit.ly, j.mp, or bitly.com to use for your shortened URLs.

##Usage
Shortner can be used from any template or plugin. 

###Template Options
You have two options to use shortner from a template, as a Twig filter or as a plugin variable.

####Twig Filter
	{% set longUrl = 'https://buildwithcraft.com/' %}
	<p>Shortened Url: {{ longUrl|shorten }}</p>

####Plugin Variable
	{% set longUrl = 'https://buildwithcraft.com/' %}
	{% set shortUrl = craft.shorten.shorten(longUrl) %}
	
###From a Plugin
To call `shorten` from a different Craft plugin:

    $shortUrl = craft()->shortner->shorten($longUrl);