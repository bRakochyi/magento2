<?php
/**
 * Elogic Customers Collection
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Customers\Model\ResourceModel\Customers;

use Elogic\Customers\Model\Customers;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package Elogic\Customers\Model\ResourceModel\Customers
 */
class Collection extends AbstractCollection
{
    /**
     * Initialization Collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(Customers::class, \Elogic\Customers\Model\ResourceModel\Customers::class);
    }
}
