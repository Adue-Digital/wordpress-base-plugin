<?php

namespace Adue\WordPressBasePlugin\Helpers\Traits;

trait UseConfig
{

    public function config()
    {
        return \Adue\WordPressBasePlugin\Base\Config::instance();
    }

}