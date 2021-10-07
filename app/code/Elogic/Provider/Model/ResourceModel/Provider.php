<?php
/**
 * Copyright © Bohdan Rakochyi, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Elogic\Provider\Model\ResourceModel;

/**
 * Class Provider
 * @package Elogic\Provider\Model\ResourceModel
 */
class Provider extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @return void
     */
    public function _construct()
    {
        $this->_init('elogic_provider', 'post_id');
    }
}
