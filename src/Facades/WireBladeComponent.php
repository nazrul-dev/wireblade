<?php

namespace WireBlade\Facades;

use Illuminate\Support\Facades\Facade;
use WireBlade\WireBladeComponentResolver;

/**
 * @method static string resolve(string $originalComponentName)
 */
class WireBladeComponent extends Facade
{
    protected static function getFacadeAccessor()
    {
        return WireBladeComponentResolver::class;
    }
}
