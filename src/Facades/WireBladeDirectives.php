<?php

namespace WireBlade\Facades;

use Illuminate\Support\Facades\Facade;
use WireBlade\WireBladeBladeDirectives;

/**
 * @method static string scripts(bool $absolute = true)
 * @method static string styles(bool $absolute = true)
 * @method static string|null getManifestVersion(string $file, ?string &$route = null)
 * @method static string confirmAction(string $expression)
 * @method static string notify(string $expression)
 * @method static string boolean(string $value)
 */
class WireBladeDirectives extends Facade
{
    protected static function getFacadeAccessor()
    {
        return WireBladeBladeDirectives::class;
    }
}
