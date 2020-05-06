<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magnat\Price\Plugin;

class ProductInterface
{
    public function afterGetPrice($result) {
        
        return $result = 100;
    }
}