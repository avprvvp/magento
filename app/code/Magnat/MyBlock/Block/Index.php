<?php

namespace Magnat\MyBlock\Block;

use Magento\Framework\View\Element\AbstractBlock;

class Index extends AbstractBlock
{
    protected function _toHtml()
    {
        return 'Test!!';
    }
}
