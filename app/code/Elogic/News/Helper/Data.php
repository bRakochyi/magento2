<?php
/**
 * Elogic Helper Data
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Data
 *
 * @package Elogic\News\Helper
 */
class Data extends AbstractHelper
{
    /**
     * Constant for enabling news on frontend store
     */
    const XML_PATH_ENABLED      = 'news/general/enable_in_frontend';

    /**
     * Constant for head title on frontend store
     */
    const XML_PATH_HEAD_TITLE   = 'news/general/head_title';

    /**
     * Constant for lastest position on frontend store
     */
    const XML_PATH_LASTEST_NEWS = 'news/general/lastest_news_block_position';

    /**
     * @var ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($context);
        $this->_scopeConfig = $scopeConfig;
    }

    /**
     * Check for module is enabled in frontend
     *
     * @return bool
     */
    public function isEnabledInFrontend()
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get head title for news list page
     *
     * @return string
     */
    public function getHeadTitle()
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_HEAD_TITLE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get lastest news block position (Left, Right, Disabled)
     *
     * @return int
     */
    public function getLastestNewsBlockPosition()
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_LASTEST_NEWS,
            ScopeInterface::SCOPE_STORE
        );
    }
}
