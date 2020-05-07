<?php

namespace Magnat\Price\Plugin;

class Price
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        return $result + 100;
    }
}
