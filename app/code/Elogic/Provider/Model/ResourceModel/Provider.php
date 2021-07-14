<?php
/**
 * Elogic Resource Model Provider
 *
 * @category Elogic
 * @Package Elogic/Provider
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Provider\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
/**
 * Class Provider
 * @package Elogic\Provider\Model\ResourceModel
 */
class Provider extends AbstractDb
{
    /**
     * Initialization resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('elogic_provider', 'post_id');
    }
}
