<?php
/**
 * Copyright © Bohdan Rakochyi, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Elogic\Provider\Model\ResourceModel\Provider;

/**
 * Class Collection
 * @package Elogic\Provider\Model\ResourceModel\Provider
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @return void
     */
    public function _construct()
    {
        $this->_init(\Elogic\Provider\Model\Provider::class, \Elogic\Provider\Model\ResourceModel\Provider::class);
    }
}
