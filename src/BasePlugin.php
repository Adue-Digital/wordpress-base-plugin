<?php

namespace Adue\WordPressBasePlugin;

use Adue\WordPressBasePlugin\Base\Activator;
use Adue\WordPressBasePlugin\Base\Deactivator;
use Adue\WordPressBasePlugin\Base\Loader;
use Noodlehaus\Config;

class BasePlugin
{

    protected string $configFilePath = '';
    protected array $dependencies = [];
    protected Activator $activator;
    protected Deactivator $deactivator;
    protected Loader $loader;

    public function __construct()
    {
        $this->loadConfig();
        $this->loadDependences();
    }

    private function loadConfig()
    {
        if(file_exists($this->configFilePath))
            $this->config = new Config($this->configFilePath);
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