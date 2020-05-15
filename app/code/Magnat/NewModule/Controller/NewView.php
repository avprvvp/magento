<?php

namespace Magnat\NewModule\Controller;

use Magento\Catalog\Controller\Product\View;
use \Magento\Framework\Controller\Result\Raw;
use \Magento\Framework\App\Action\Context;
use \Magento\Catalog\Helper\Product\View as ViewHelper;
use \Magento\Framework\Controller\Result\ForwardFactory;
use \Magento\Framework\View\Result\PageFactory;

class NewView extends View
{
    /**
     * @var Raw
     */
    protected $resultRaw;

    public function __construct(
        Context $context,
        Raw $resultRaw,
        ViewHelper $viewHelper,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory
    
    ) {
        parent::__construct($context, $viewHelper, $resultForwardFactory, $resultPageFactory);
        $this->resultRaw = $resultRaw;
    }

    public function execute ()
    {
        return $this->resultRaw->setContents('some raw');
    }
}
