<?php

namespace Magnat\HtmlToLog\Observer;

use Psr\Log\LoggerInterface as PsrLoggerInterface;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class RecordHtml implements ObserverInterface
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
    ) {
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $html = $observer->getEvent()->getResponse()->getBody();
        $this->logger->notice($html);
    }
}
