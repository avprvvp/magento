<?php

namespace Magnat\MyModule\Observer;

use Psr\Log\LoggerInterface as PsrLoggerInterface;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class MyObserver implements ObserverInterface
{
    /**
     * @var PsrLoggerInterface
     */
    private $logger;

    /**
     * MyObserver constructor.
     *
     * @param PsrLoggerInterface $logger
     */
    public function __construct(
        PsrLoggerInterface $logger
    )
    {        
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $url = $observer->getEvent()->getRequest()->getPathInfo();
        $this->logger->notice($url);
    }
}
