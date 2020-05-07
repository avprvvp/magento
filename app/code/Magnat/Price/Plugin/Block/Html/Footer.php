<?php

namespace Magnat\Price\Plugin\Block\Html;

class Footer 
{
    public function aroundGetCopyright($result)
    {
        return $result = 'Customized copyright!';
    }
}
