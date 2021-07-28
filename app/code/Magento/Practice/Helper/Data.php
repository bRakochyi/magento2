<?php
/**
 * Magento Helper Data
 *
 * @category Magento
 * @Package Magento/Practice
 * @author Bohdan Rakochyi
 * @copyright 2021 Magento
 */
namespace Magento\Practice\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Data
 * @package Magento\Practice\Helper
 */
class Data extends AbstractHelper
{
    /**
     * Constant XML Path Practice
     */
    const XML_PATH_PRACTICE = 'practice/';

    /**
     * Get Configuration Value
     *
     * @param $field
     * @param null $storeId
     * @return mixed
     */
    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field, ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get General Configuration
     *
     * @param $code
     * @param null $storeId
     * @return mixed
     */
    public function getGeneralConfig($code, $storeId = null)
    {

        return $this->getConfigValue(self::XML_PATH_PRACTICE .'general/'. $code, $storeId);
    }
}
