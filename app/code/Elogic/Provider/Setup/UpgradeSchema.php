<?php
/**
 * Elogic Upgrade Schema
 *
 * @category Elogic
 * @Package Elogic/Provider
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Provider\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

/**
 * Adding column for logotype
 *
 * Class UpgradeSchema
 *
 * @package Elogic\Provider\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Method for update schema 'elogic_provider', add new column 'Logotype'
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if(version_compare($context->getVersion(), '1.2.0', '<')) {
            $installer->getConnection()->addColumn(
                $installer->getTable('elogic_provider'),
                'logotype',
                [
                    'type' => Table::TYPE_TEXT,
                    'nullable' =>  true,
                    'length' => '1000',
                    'comment' => 'Logotype',
                    'after' => 'image'
                ]
            );
        }
        $installer->endSetup();
    }
}
