<?php

namespace Magnat\HelloWorld\Controller\Index;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\Controller\Result\RawFactory;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\Controller\Result\Redirect;


class Index extends Action
{   
    /**
     * @var RawFactory
     */
    protected $resultRawFactory;

    /**
     * @var Redirect
     */
    protected $resultRedirect;
       
    public function __construct(
        Context $context,
        RawFactory $resultRawFactory,
        Redirect $resultRedirect
    )
    {
        $this->resultRawFactory = $resultRawFactory;
        $this->resultRedirect = $resultRedirect;
        return parent::__construct($context);
    }
    
    public function execute()
    {
        $result = $this->resultRawFactory->create();

        return $this->resultRedirect->setPath('clothes.html');
        // return $result->setContents('hello world');
    }
}
