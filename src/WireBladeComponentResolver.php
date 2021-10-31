<?php

namespace WireBlade;

class WireBladeComponentResolver
{
    public function resolve(string $originalComponentName): string
    {
        $components = config('wireblade.components');

        return $components[$originalComponentName]['alias'];
    }
}
