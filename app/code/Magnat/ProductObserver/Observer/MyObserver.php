<?php

namespace Magnat\ProductObserver\Observer;

use Psr\Log\LoggerInterface;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class MyObserver implements ObserverInterface
{
    private $logger;

    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $attributes = [];
        foreach ($product->getAttributes() as $attribute) {
            $attributes[] = $attribute->getName();
        }
        foreach ($attributes as $$attribute) {
            $productName = $product['name'];
            $old = $product->getOrigData($$attribute);
            $new = $product->getData($$attribute);

            if (!is_array($old) && !is_array($new) && $old !== $new) {
                $event = "Change $attribute $old => $new in $productName";
                $this->logger->notice($event);
            }
        }
    }
}
