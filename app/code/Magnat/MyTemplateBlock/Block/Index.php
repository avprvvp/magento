<?php

namespace Magnat\MyTemplateBlock\Block;

use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\View\Element\Template;

class Index extends Template
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }
}
