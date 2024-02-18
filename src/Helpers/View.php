<?php

namespace Adue\WordPressBasePlugin\Helpers;

use Adue\WordPressBasePlugin\Helpers\Traits\UseConfig;

class View
{

    public array $variables = [];

    use UseConfig;

    public function __construct(public $basePath) {}

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