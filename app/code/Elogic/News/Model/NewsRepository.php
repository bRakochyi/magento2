<?php
/**
 * Elogic Model NewsRepository
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Model;

use Elogic\News\Api\Data\NewsInterface;
use Elogic\News\Api\NewsRepositoryInterface;
use Elogic\News\Model\ResourceModel\News as ResourceNews;
use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class Model NewsRepository
 *
 * @package Elogic\News\Model
 */
class NewsRepository implements NewsRepositoryInterface
{
    /**
     * Property for ResourceModel News
     *
     * @var ResourceNews
     */
    protected $resource;

    /**
     * Property for News Factory
     *
     * @var NewsFactory
     */
    protected $newsFactory;

    /**
     * NewRepository construct
     *
     * @param ResourceNews $resource
     * @param NewsFactory $newsFactory
     */
    public function __construct
    (
        ResourceNews $resource,
        NewsFactory $newsFactory
    )
    {
        $this->resource = $resource;
        $this->newsFactory = $newsFactory;
    }

    /**
     * Save news
     *
     * @param NewsInterface $news
     * @return NewsInterface
     * @throws CouldNotSaveException
     */
    public function save(NewsInterface $news)
    {
        try {
            $this->resource->save($news);
        } catch (Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $news;
    }

    /**
     * Get News
     *
     * @param int $id
     * @return NewsInterface|News
     * @throws NoSuchEntityException
     */
    public function get(int $id)
    {
        $news = $this->newsFactory->create();
        $news->load($id);
        if (!$news->getId()) {
            throw new NoSuchEntityException(__('Faq with id "%1" does not exist.', $id));
        }
        return $news;
    }

    /**
     * Delete News
     *
     * @param NewsInterface $news
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(NewsInterface $news)
    {
        try {
            $this->resource->delete($news);
        } catch (Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Faq: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete News By ID
     *
     * @param int $id
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $id): bool
    {
        return $this->delete($this->get($id));
    }
}
