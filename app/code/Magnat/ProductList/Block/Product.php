<?php

namespace Magnat\ProductList\Block;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Api\SortOrder;

class Product extends \Magento\Framework\View\Element\Template
{

    protected $productRepository;

    protected $searchCriteriaBuilder;

    protected $filterBuilder;

    protected $sortOrderBuilder;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder,
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
        parent::__construct($context, $data);
    }
    
    public function getProductList()
    {
        $filterName[] = $this->filterBuilder
            ->setField(ProductInterface::NAME)
            ->setConditionType('like')
            ->setValue('%s%')
            ->create();
        $filterPrice[] = $this->filterBuilder
            ->setField('price')
            ->setValue("10")
            ->setConditionType('gteq')
            ->create();
        $sortOrder = $this->sortOrderBuilder
            ->setField(ProductInterface::PRICE)
            ->setDirection(SortOrder::SORT_DESC)
            ->create();
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilters($filterName)
            ->addFilters($filterPrice)
            ->addSortOrder($sortOrder)
            ->setPageSize(6)
            ->create();
        $products = $this->productRepository
            ->getList($searchCriteria)
            ->getItems();

        $result = [];
        foreach ($products as $product) {
            $productName = $product->getName();
            $productPrice = $product->getPrice();
            $result[] = $productName . ' => ' . $productPrice;
        }

        return $result;
    }
}
