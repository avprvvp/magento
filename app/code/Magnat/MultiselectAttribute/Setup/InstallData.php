<?php

namespace Magnat\MultiselectAttribute\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Catalog\Model\ResourceModel\Eav\Attribute;
use Magento\Catalog\Model\Product;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'multiselect_attr',
            [
                'type' => 'text',
                'label' => 'Multiselect Attribute',
                'input' => 'multiselect',
                'global' => Attribute::SCOPE_GLOBAL,
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'visible' => true,
                'required' => false,
                'visible_on_front' => true,
                'option' => ['values' => [
                    'One',
                    'Two',
                    'Three',
                    ],
                ],
            ]
        );
    }
}
