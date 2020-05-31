<?php

namespace Magnat\Stores\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Backend\Block\Template\Context;
use \Magento\Store\Model\StoreManagerInterface;
use \Magento\Catalog\Model\CategoryFactory;

class Store extends Template
{

    protected $categoryFactory;

    protected $storeManager;
        
    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager,
        CategoryFactory $categoryFactory,
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        $this->categoryFactory = $categoryFactory;
        parent::__construct($context, $data);
    }
    
    public function getStoresInfo()
    {
        $stores = $this->storeManager->getStores();
        $result = [];
        foreach ($stores as $store) {
            $category = $this->categoryFactory
                ->create()
                ->load($store->getRootCategoryId());
            $storeName = $store->getName();
            $categoryName = $category->getName();
            $result[] = $storeName . ' -> ' . $categoryName;
        }
        return $result;
    }
}
