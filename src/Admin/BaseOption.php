<?php

namespace Adue\WordPressBasePlugin\Admin;

class BaseOption
{

    protected string $name = '';
    protected $value = null;
    protected bool $deprecated = false;
    protected bool $autoload = true;

    public function get()
    {
        return get_option($this->name);
    }

    public function add()
    {
        add_option(
            $this->name,
            $this->value,
            $this->deprecated,
            $this->autoload
        );
    }

    public function update($value, $autoload = true)
    {
        update_option(
            $this->name,
            $value,
            $autoload
        );
    }

}