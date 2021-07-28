<?php
/**
 * Magento Model Post
 *
 * @category Magento
 * @Package Magento/Practice
 * @author Bohdan Rakochyi
 * @copyright 2021 Magento
 */
namespace Magento\Practice\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Post
 * @package Magento\Practice\Model
 */
class Post extends AbstractModel implements IdentityInterface
{
    /**
     * Constant Cache tag for magento_practice_post
     */
    const CACHE_TAG = 'magento_practice_post';

    /**
     * @var string
     */
    protected $_cacheTag = 'magento_practice_post';

    /**
     * @var string
     */
    protected $_eventPrefix = 'magento_practice_post';

    /**
     * Resource Model Post
     */
    protected function _construct()
    {
        $this->_init('Magento\Practice\Model\ResourceModel\Post');
    }

    /**
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        return [];
    }
}
