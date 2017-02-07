<?php

namespace Alexusmai\LaravelPurifier\Facades;


use Illuminate\Support\Facades\Facade;

class PurifierFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'purifier';
    }
}