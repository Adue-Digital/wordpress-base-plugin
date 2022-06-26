<?php

namespace Adue\WordPressBasePlugin\Modules\Admin;

use Adue\WordPressBasePlugin\Helpers\Traits\UseLoader;

class BaseOption
{

    protected string $name = '';
    protected $value = null;
    protected bool $deprecated = false;
    protected bool $autoload = true;

    use UseLoader;

    public function get()
    {
        return get_option($this->name);
    }

    public function add()
    {
        $this->loader()->addAction('init', $this, 'addOption');
    }

    public function addOption()
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