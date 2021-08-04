<?php
/**
 * Elogic Block Widget News
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Block\Widget;

use Elogic\News\Model\NewsFactory;
use Magento\Catalog\Block\Product\Context;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

/**
 * Class News
 *
 * @package Elogic\News\Block\Widget
 */
class News extends Template implements BlockInterface
{
    /**
     * News Factory Model
     *
     * @var NewsFactory
     */
    public $_newsFactory;

    /**
     * Widget News construct
     *
     * @param Context $context
     * @param NewsFactory $newsFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        NewsFactory $newsFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->setTemplate('Elogic_News::widget/news.phtml');
        $this->_newsFactory = $newsFactory;
    }

    /**
     * Get News Collection
     *
     * @return AbstractCollection|AbstractDb|null
     */
    public function getNewsCollection()
    {
        $news = $this->_newsFactory->create();
        return $news->getCollection();
    }
}
