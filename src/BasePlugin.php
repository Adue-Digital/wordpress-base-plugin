<?php

namespace Adue\WordPressBasePlugin;

use Adue\WordPressBasePlugin\Base\Activator;
use Adue\WordPressBasePlugin\Base\Deactivator;
use Adue\WordPressBasePlugin\Base\Loader;
use Adue\WordPressBasePlugin\Views\View;
use Noodlehaus\Config;

class BasePlugin
{

    protected string $configFilePath = '';
    protected array $dependencies = [];
    protected Activator $activator;
    protected Deactivator $deactivator;
    protected Loader $loader;
    protected Config $config;
    protected View $view;

    public function __construct()
    {
        $this->loadConfig();
        $this->loadView();
        $this->loadDependences();
    }

    private function loadConfig()
    {
        if(file_exists($this->configFilePath))
            $this->config = new Config($this->configFilePath);
    }

    private function loadView()
    {
        $this->view = new View($this->config->get('base_view_path'));
    }

    public function getView()
    {
        return $this->view;
    }

    private function loadDependences()
    {
        $this->activator = new Activator();
        $this->deactivator = new Deactivator();
        $this->loader = new Loader();
    }

    public function init() {}

    public function run()
    {
        $this->loader->run();
    }

}