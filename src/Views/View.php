<?php

namespace Adue\WordPressBasePlugin\Views;

class View
{

    public string $basePath = '';
    public array $variables = [];

    public function __construct($basePath)
    {
        $this->basePath = $basePath;
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