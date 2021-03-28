<?php

namespace WeStacks\Laravel\Installer;

use GuzzleHttp\Client;

class Core
{
    protected $config;
    protected $client;

    public function __construct(array $config = [])
    {
        $this->config = [
            // Setup config
        ];
    }
}