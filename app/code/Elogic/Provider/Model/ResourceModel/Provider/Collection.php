<?php
/**
 * Elogic Provider Collection
 *
 * @category Elogic
 * @Package Elogic/Provider
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Provider\Model\ResourceModel\Provider;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
/**
 * Class Collection
 * @package Elogic\Provider\Model\ResourceModel\Provider
 */
class Collection extends AbstractCollection
{
    /**
     * Initialization collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(\Elogic\Provider\Model\Provider::class, \Elogic\Provider\Model\ResourceModel\Provider::class);
    }
}
