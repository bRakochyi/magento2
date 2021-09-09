<?php
/**
 * Elogic ResourceModel News
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class ResourceModel News
 *
 * @package Elogic\News\Model\Resource
 */
class News extends AbstractDb
{
    /**
     * Initialization resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('elogic_news', 'news_id');
    }
}
