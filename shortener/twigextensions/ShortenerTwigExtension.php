<?php

/*
*
* Shortener for Craft - Twig Filter Extension
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/craft-shortener
*
*/

namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class ShortenerTwigExtension extends Twig_Extension
{
    public function getName()
    {
        return 'shortener';
    }

    public function getFilters()
    {
        return array(
            'shorten' => new Twig_Filter_Method($this, 'shorten'),
        );
    }

    public function shorten($url)
    {
        $shortened = craft()->shortener->shorten($url);
        return $shortened;
    }
}