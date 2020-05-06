<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magnat\Price\Plugin\Block\Html;

class Footer 
{
    public function aroundGetCopyright($result)
    {
        return $result = 'Customized copyright!';
    }
}