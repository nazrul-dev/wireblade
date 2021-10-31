<?php

namespace WireBlade\View\Components\Select;

class UserOption extends Option
{
    public ?string $img;

    public function __construct(
        bool $readonly = false,
        bool $disabled = false,
        ?string $label = null,
        ?string $value = null,
        ?string $img = null,
        $option = null
    ) {
        parent::__construct($readonly, $disabled, $label, $value, $option);

        $this->img = $img;
    }

    public function render()
    {
        return view('wireblade::components.select.user-option');
    }
}
