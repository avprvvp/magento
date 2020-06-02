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
        $attributes = $product->getAttributes();
        $values = [];
        foreach ($attributes as $attribute) {
            $values[] = $attribute->getName();
        }
        foreach ($values as $value) {
            $productName = $product['name'];
            $old = $product->getOrigData($value);
            $new = $product->getData($value);

            if (!is_array($old) && !is_array($new) && $old !== $new) {
                $event = "Change $value $old => $new in $productName";
                $this->logger->notice($event);
            }
        }
    }
}
