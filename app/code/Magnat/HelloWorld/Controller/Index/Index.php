<?php

namespace Magnat\HelloWorld\Controller\Index;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\Controller\Result\RawFactory;
use \Magento\Framework\App\Action\Context;


class Index extends Action
{   
    /**
     * @var RawFactory
     */
    protected $resultRawFactory;
       
    public function __construct(
        Context $context,
        RawFactory $resultRawFactory
    )
    {
        $this->resultRawFactory = $resultRawFactory;
        return parent::__construct($context);
    }
    
    public function execute()
    {
        $result = $this->resultRawFactory->create();
       
        return $result->setContents('hello world');
    }
}
