<?php

namespace Magnat\Database\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class MyPatch implements DataPatchInterface
{
    private $moduleDataSetup;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->insertMultiple(
            $this->moduleDataSetup->getTable('new_table'),
            [
                ['name' => 'John', 'email' => '1@l.ru', 'password' => '123'],
                ['name' => 'John1', 'email' => '11@l.ru', 'password' => '123'],
            ]
        );
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}
