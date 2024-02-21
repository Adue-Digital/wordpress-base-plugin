<?php

namespace Adue\WordPressBasePlugin\Modules\Misc;

use Adue\WordPressBasePlugin\Base\Loader;

class BaseApiEndopint
{

    protected string $namespace = '';
    protected string $uri = '';
    protected array $methods = ['GET'];
    private Loader $loader;

    private array $availableMethods = ['GET', 'POST', 'PUT', 'PATCH'];

    public function __construct(string $namespace, string $uri, Loader $loader)
    {
        $this->loader = $loader;
    }

    public function handle($request)
    {}

    public function init(): void
    {
        $this->loader->addAction('rest_api_init', $this, 'register', 10, 0 );
    }

    public function register(): void
    {
        register_rest_route(
            $this->namespace,
            $this->uri,
            [
                'methods' => $this->methods,
                'callback' => [$this, 'handle']
            ]
        );
    }

}