<?php

namespace WireBlade\Support;

use Illuminate\View\Compilers\ComponentTagCompiler;
use WireBlade\Facades\WireBladeDirectives;

class WireBladeTagCompiler extends ComponentTagCompiler
{
    public function compile($value)
    {
        return $this->compileWireBladeSelfClosingTags($value);
    }

    protected function compileWireBladeSelfClosingTags($value)
    {
        $pattern = '<\s*wireblade\:(scripts|styles)\s*\/?>';

        return preg_replace_callback($pattern, function (array $matches) {
            if ($matches[1] === 'scripts') {
                $element = WireBladeDirectives::scripts();
            }

            if ($matches[1] === 'styles') {
                $element = WireBladeDirectives::styles();
            }

            return trim($element, '<>');
        }, $value);
    }
}
