<?php

/*
*
* Shortner for Craft - Twig Filter Extension
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/craft-shortner
*
*/

namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class ShortnerTwigExtension extends Twig_Extension
{
    public function getName()
    {
        return 'shortner';
    }

    public function getFilters()
    {
        return array(
            'shorten' => new Twig_Filter_Method($this, 'shorten'),
        );
    }

    public function shorten($url)
    {
        $shortened = craft()->shortner->shorten($url);
        return $shortened;
    }
}