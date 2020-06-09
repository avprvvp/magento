<?php

namespace Magnat\CustomerList\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\FilterGroupBuilder;

class Customer extends Template
{
    public function __construct(
        Context $context,
        CustomerRepositoryInterface $customerRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        FilterGroupBuilder $filterGroupBuilder,
        array $data = []
    ) {
        $this->customerRepository = $customerRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->filterGroupBuilder = $filterGroupBuilder;
        parent::__construct($context, $data);
    }
    
    public function getCustomerList()
    {
        $filterName = $this->filterBuilder
            ->setField(CustomerInterface::FIRSTNAME)
            ->setConditionType('like')
            ->setValue('%t%')
            ->create();
        $filterEmail = $this->filterBuilder
            ->setField(CustomerInterface::EMAIL)
            ->setValue('%a%')
            ->setConditionType('like')
            ->create();
        $filterGroup = $this->filterGroupBuilder
            ->setFilters([$filterName, $filterEmail])
            ->create();
        $searchCriteria = $this->searchCriteriaBuilder
            ->setFilterGroups([$filterGroup])
            ->create();
        $customers = $this->customerRepository
            ->getList($searchCriteria)
            ->getItems();

        return $customers;
    }
}
