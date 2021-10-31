<?php

namespace WireBlade\Controllers;

use Livewire\Controllers\CanPretendToBeAFile;

class WireBladeAssetsController
{
    use CanPretendToBeAFile;

    public function scripts()
    {
        return $this->pretendResponseIsFile(__DIR__ . '/../../dist/wireblade.js', $mimeType = 'application/javascript');
    }

    public function styles()
    {
        return $this->pretendResponseIsFile(__DIR__ . '/../../dist/wireblade.css', $mimeType = 'text/css');
    }
}
