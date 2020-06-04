<?php

namespace Magnat\CustomerAttr\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Catalog\Model\ResourceModel\Eav\Attribute;
use Magento\Customer\Model\Customer;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Eav\Model\Config;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory, Config $eavConfig)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            Customer::ENTITY,
            'priority',
            [
                'type' => 'int',
                'label' => 'Priority',
                'input' => 'select',
                'global' => Attribute::SCOPE_GLOBAL,
                'backend' => 'int',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'system' => 0,
                'visible' => true,
                'required' => false,
                'option' =>
                array (
                    'values' =>
                        array (
                            1 => '1',
                            2 => '2',
                            3 => '3',
                            4 => '4',
                            5 => '5',
                            6 => '6',
                            7 => '7',
                            8 => '8',
                            9 => '9',
                            10 => '10'
                        ),
                ),
            ]
        );
        $priorityAttr = $this->eavConfig->getAttribute(Customer::ENTITY, 'priority');
        $priorityAttr->setData(
            'used_in_forms',
            ['adminhtml_customer']
        );
        $priorityAttr->save();
    }
}
