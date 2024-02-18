<?php

namespace Adue\WordPressBasePlugin;

use Adue\WordPressBasePlugin\Base\Activator;
use Adue\WordPressBasePlugin\Base\Config;
use Adue\WordPressBasePlugin\Base\Deactivator;
use Adue\WordPressBasePlugin\Helpers\Traits\UseLoader;
use DI\Container;


class BasePlugin
{

    protected string $configFilePath = '';
    protected array $dependencies = [];
    protected Activator $activator;
    protected Deactivator $deactivator;

    use UseLoader;

    public function __construct(public Container $container)
    {
        $this->loadConfig();
        $this->loadDependences();
    }

    private function loadConfig()
    {
        if(file_exists($this->configFilePath))
            Config::setConfig($this->configFilePath);
    }

    private function loadDependences()
    {
        $this->activator = new Activator();
        $this->deactivator = new Deactivator();
    }

    public function init() {}

    public function run()
    {
        $this->loader()->run();
    }

}