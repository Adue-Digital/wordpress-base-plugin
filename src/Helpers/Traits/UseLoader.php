<?php

namespace Adue\WordPressBasePlugin\Helpers\Traits;

trait UseLoader
{

    public function loader()
    {
        return \Adue\WordPressBasePlugin\Base\Loader::instance();
    }

}