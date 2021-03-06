<?php

namespace WireBlade\Controllers;

class IconsController extends Controller
{
    public function getIcon(string $style, string $icon)
    {
        return response()
            ->view("wireblade::components.icons.{$style}.{$icon}", ['attributes' => null])
            ->withHeaders([
                'Content-Type'  => 'image/svg+xml; charset=utf-8',
                'Cache-Control' => 'public, only-if-cached, max-age=31536000',
            ]);
    }
}
