<?php
/**
 * Elogic Uploader
 *
 * @category Elogic
 * @Package Elogic/Provider
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Provider\Model\Attribute\Frontend;

use Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend;

/**
 * Class ProviderAttr
 * @package Elogic\Provider\Model\Attribute\Frontend
 */
class ProviderAttr extends AbstractFrontend
{
    /**
     * Get attribute value
     *
     * @param \Magento\Framework\DataObject $object
     * @return string
     */
    public function getValue(\Magento\Framework\DataObject $object): string
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());
        return "<b>$value</b>";
    }
}
