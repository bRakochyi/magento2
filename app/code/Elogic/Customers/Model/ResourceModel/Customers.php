<?php
/**
 * Elogic Resource Model Customers
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Customers\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Customers
 *
 * @package Elogic\Customers\Model\ResourceModel
 */
class Customers extends AbstractDb
{
    /**
     * Initialization resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('elogic_customers', 'customer_id');
    }
}
