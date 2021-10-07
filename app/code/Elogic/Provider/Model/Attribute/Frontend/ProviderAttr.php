<?php
/**
 * Copyright © Bohdan Rakochyi, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Elogic\Provider\Model\Attribute\Frontend;
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
use Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend;

/**
 * Class ProviderAttr
 * @package Elogic\Provider\Model\Attribute\Frontend
 */
class ProviderAttr extends AbstractFrontend
{
    /**
     * @param \Magento\Framework\DataObject $object
     * @return string
     */
    public function getValue(\Magento\Framework\DataObject $object): string
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());
        return "<b>$value</b>";
    }
}
