<?php

namespace Adue\WordPressBasePlugin\Helpers;

use Adue\WordPressBasePlugin\Helpers\Traits\UseConfig;

class View
{

    public string $basePath = '';
    public array $variables = [];

    use UseConfig;

    public function __construct()
    {
        $this->basePath = $this->config()->get('base_view_path');
    }

    public function set($name, $value)
    {
        $this->variables[$name] = $value;
    }

    public function render($view)
    {
        extract($this->variables);
        include $this->basePath.'/'.$view.'.php';
    }

}