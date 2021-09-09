<?php
/**
 * Elogic Model News
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Model;

use Elogic\News\Api\Data\NewsInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Model News
 *
 * @package Elogic\News\Model
 */
class News extends AbstractModel implements NewsInterface
{
    /**
     * Get News ID
     *
     * @return int
     */
    public function getNewsId(): int
    {
        return $this->getData(self::ID);
    }

    /**
     * Set News ID
     *
     * @param int $id
     * @return News
     */
    public function setNewsId(int $id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get Created At
     *
     * @return array|mixed|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set Created At
     *
     * @param $created_at
     * @return News
     */
    public function setCreatedAt($created_at)
    {
        return $this->setData(self::CREATED_AT, $created_at);
    }

    /**
     * Get News Title
     *
     * @return string
     */
    public function getNewsTitle()
    {
        return $this->getData(self::NEWS_TITLE);
    }

    /**
     * Set News Title
     *
     * @param string $news_title
     * @return News
     */
    public function setNewsTitle(string $news_title)
    {
        return $this->setData(self::NEWS_TITLE, $news_title);
    }

    /**
     * Get Link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->getData(self::LINK);
    }

    /**
     * Set Link
     *
     * @param string $link
     * @return News
     */
    public function setLink(string $link)
    {
        return $this->setData(self::LINK, $link);
    }

    /**
     * Initialization model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\News::class);
    }
}
