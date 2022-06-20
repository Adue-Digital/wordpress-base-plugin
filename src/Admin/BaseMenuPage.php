<?php

namespace Adue\WordPressBasePlugin\Admin;

class BaseMenuPage
{

    protected string $pageTitle = '';
    protected string $menuTitle = '';
    protected string $capability = '';
    protected string $menuSlug = '';
    protected string $iconUrl = '';
    protected int $position = 0;

    public function add()
    {
        add_menu_page(
            $this->pageTitle,
            $this->menuTitle,
            $this->capability,
            $this->menuSlug,
            [$this, 'render'],
            $this->iconUrl,
            $this->position,
        );
    }

    public function render()
    {
        //Render page content
    }

}