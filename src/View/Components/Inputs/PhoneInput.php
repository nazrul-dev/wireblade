<?php

namespace WireBlade\View\Components\Inputs;

class PhoneInput extends BaseMaskable
{
    protected function getInputMask(): string
    {
        return "['(###) ###-####', '+# ### ###-####', '+## ## ####-####']";
    }
}
