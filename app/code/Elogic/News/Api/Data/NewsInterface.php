<?php
/**
 * Elogic News Interface
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Api\Data;

/**
 * Interface NewsInterface
 *
 * @package Elogic\News\Api\Data
 */
interface NewsInterface
{
    /**
     * Constant for column's name "news_id" in table elogic_news
     */
    const ID = 'news_id';

    /**
     * Constant for column's name "created_at" in table elogic_news
     */
    const CREATED_AT = 'created_at';

    /**
     * Constant for column's name "news_title" in table elogic_news
     */
    const NEWS_TITLE = 'news_title';

    /**
     * Constant for column's name "list" in table elogic_news
     */
    const LINK = 'link';

    /**
     * Return news id
     *
     * @return int
     */
    public function getNewsId(): int;

    /**
     * Change news id
     *
     * @param int $id
     * @return mixed
     */
    public function setNewsId(int $id);

    /**
     * Return created at
     *
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * Change created at
     *
     * @param $created_at
     * @return mixed
     */
    public function setCreatedAt($created_at);

    /**
     * Return news title
     *
     * @return string
     */
    public function getNewsTitle();

    /**
     * Change news title
     *
     * @param string $news_title
     * @return mixed
     */
    public function setNewsTitle(string $news_title);

    /**
     * Return link
     *
     * @return string
     */
    public function getLink();

    /**
     * Change link
     *
     * @param string $link
     * @return mixed
     */
    public function setLink(string $link);
}
