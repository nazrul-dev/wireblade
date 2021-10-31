<?php

namespace WireBlade\View\Components;

class Radio extends Checkbox
{
    protected function getView(): string
    {
        return 'wireblade::components.radio';
    }
}
