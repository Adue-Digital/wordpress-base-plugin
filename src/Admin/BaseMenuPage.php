<?php

namespace Adue\WordPressBasePlugin\Admin;

use Adue\WordPressBasePlugin\Views\View;

class BaseMenuPage
{

    protected string $pageTitle = '';
    protected string $menuTitle = '';
    protected string $capability = '';
    protected string $menuSlug = '';
    protected string $iconUrl = '';
    protected int $position = 0;

    protected array $submenuItems = [];

    protected $view;

    public function setView($view)
    {
        $this->view = $view;
    }

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

    public function addSubmenus()
    {
        foreach ($this->submenuItems as $submenuItem)
            add_submenu_page(
                $this->menuSlug,
                $submenuItem->pageTitle,
                $submenuItem->menuTitle,
                $submenuItem->capability,
                $submenuItem->menuSlug,
                [$submenuItem, 'render'],
                $submenuItem->position,
            );
    }

    public function render()
    {
        //Render page content
    }

}