<?php
/**
 * Elogic Upgrade Schema
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Customers\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

/**
 * Class UpgradeSchema
 *
 * @package Elogic\Customers\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Method for update schema 'elogic_customers', add new column 'Photo'
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if(version_compare($context->getVersion(), '2.1.1', '<')) {
            $installer->getConnection()->addColumn(
                $installer->getTable('elogic_customers'),
                'photo',
                [
                    'type' => Table::TYPE_TEXT,
                    'nullable' =>  true,
                    'length' => '1000',
                    'comment' => 'Photo'
                ]
            );
        }
        $installer->endSetup();
    }
}
