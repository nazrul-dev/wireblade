<?php

namespace WireBlade\View\Components;

class Textarea extends Input
{
    protected function getView(): string
    {
        return 'wireblade::components.textarea';
    }
}
