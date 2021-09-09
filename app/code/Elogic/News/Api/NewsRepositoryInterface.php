<?php
/**
 * Elogic News Repository Interface
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Api;

use Elogic\News\Api\Data\NewsInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Interface NewsRepositoryInterface
 *
 * @package Elogic\News\Api
 */
interface NewsRepositoryInterface
{
    /**
     * Method Save for repository
     *
     * @param NewsInterface $news
     * @return NewsInterface
     * @throws CouldNotSaveException
     */
    public function save(NewsInterface $news);

    /**
     * Method Get for repository
     *
     * @param int $id
     * @return NewsInterface
     * @throws NewsInterface
     */
    public function get(int $id);

    /**
     * Method Delete for repository
     *
     * @param NewsInterface $news
     * @return NewsInterface
     * @throws CouldNotDeleteException
     */
    public function delete(NewsInterface $news);

    /**
     * Method Delete By ID for repository
     *
     * @param int $id
     * @return NewsInterface
     * @throws NewsInterface
     */
    public function deleteById(int $id);
}
