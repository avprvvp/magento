<?php
namespace Magnat\MyBlock\Controller\Index;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $_resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $html = $this->_resultPageFactory->create()
            ->getLayout()
            // ->createBlock('Magnat\MyBlock\Block\Index')
            ->createBlock('Magento\Framework\View\Element\Text')
            ->setText('TestTest!!')
            ->toHtml();
        return $this->getResponse()->setBody($html);
    }
}
