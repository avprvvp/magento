<?php

namespace Magnat\NewAdmin\Controller\Adminhtml\Index;

use \Magento\Backend\App\AbstractAction;
use \Magento\Framework\Controller\Result\Raw;
use \Magento\Framework\App\Action\Context;

class Index extends AbstractAction
{

    protected $resultRaw;

    protected $_publicActions = ['index'];
       
    public function __construct(
        Context $context,
        Raw $resultRaw
    ) {
        $this->resultRaw = $resultRaw;
        return parent::__construct($context);
    }

    protected function _isAllowed()
    {
        $secret = $this->_request->getParam('secret');
        if (!($secret == 1)) {
            return false;
        }
        return parent::_isAllowed();
    }
    
    public function execute()
    {
        return $this->resultRaw->setContents('dsfdfwedwedwqqqq');
    }
}
