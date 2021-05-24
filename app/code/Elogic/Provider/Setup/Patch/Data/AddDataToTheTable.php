<?php

namespace Elogic\Provider\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class AddDataToTheTable
 * @package Elogic\Provider\Setup\Patch\Data
 */
class AddDataToTheTable implements DataPatchInterface
{
    /**
     * @var \Magento\Framework\Setup\ModuleDataSetupInterface
     */
    protected $moduleDataSetup;


    /**
     * @var \Elogic\Provider\Model\ProviderFactory
     */
    protected $model;


    /**
     * @var \Elogic\Provider\Model\ResourceModel\Provider
     */
    protected $resourceModel;


    /**
     * AddDataToTheTable constructor.
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
     * @param \Elogic\Provider\Model\ProviderFactory $model
     * @param \Elogic\Provider\Model\ResourceModel\Provider $resourceModel
     */
    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup,
        \Elogic\Provider\Model\ProviderFactory $model,
        \Elogic\Provider\Model\ResourceModel\Provider $resourceModel
    )
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->model = $model;
        $this->resourceModel = $resourceModel;
    }


    /**
     * @return array
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getAliases()
    {
        return [];
    }


    /**
     * @return AddDataToTheTable|void
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        for ($i = 0; $i < 10; $i++) {
            $model = $this->model->create();

            $model->setData('name', $i)
                ->setData('description', $i)
                ->setData('logo', $i);

            $this->resourceModel->save($model);
        }

        $this->moduleDataSetup->endSetup();
    }
}
