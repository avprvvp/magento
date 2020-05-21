<?php
namespace Magnat\MyTemplateBlock\Controller\Index;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

class Template extends Action
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
            ->createBlock('Magnat\MyTemplateBlock\Block\Index')
            ->setTemplate('Magnat_MyTemplateBlock::index.phtml')
            ->toHtml();
        return $this->getResponse()->setBody($html);
    }
}
