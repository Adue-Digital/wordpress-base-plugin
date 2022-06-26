<?php

namespace Adue\WordPressBasePlugin\Helpers\Traits;

use Adue\WordPressBasePlugin\Helpers\View;

trait UseView
{

    public ?View $view = null;

    public function view()
    {
        if(is_null($this->view))
            $this->view = new View();
        return $this->view;
    }

}