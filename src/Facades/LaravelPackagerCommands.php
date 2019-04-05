<?php

namespace kallbuloso\LaravelPackagerCommands\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelPackagerCommands extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelpackagercommands';
    }
}
