<?php
/**
 * Elogic Block News List
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Block;

use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
use Elogic\News\Model\NewsFactory;
use Magento\Theme\Block\Html\Pager;

/**
 * Class NewsList
 *
 * @package Elogic\News\Block
 */
class NewsList extends Template
{
    /**
     * @var NewsFactory
     */
    protected $_newsFactory;

    /**
     * NewsList construct
     *
     * @param Template\Context $context
     * @param NewsFactory $newsFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        NewsFactory $newsFactory,
        array $data = []
    ) {
        $this->_newsFactory = $newsFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return AbstractDb|AbstractCollection|null
     */
    public function getNewsCollection(){
        $news = $this->_newsFactory->create();
        return $news->getCollection();
    }

    /**
     * Prepare layout
     *
     * @return $this
     * @throws LocalizedException
     */
    public function _prepareLayout()
    {
        parent::_prepareLayout();
        /** @var Pager */
        $pager = $this->getLayout()->createBlock(
            'Magento\Theme\Block\Html\Pager',
            'news.news.list.pager'
        );

        $pager->setLimit(5)
            ->setShowAmounts(false)
            ->setCollection($this->getNewsCollection());
        $this->setChild('pager', $pager);
        $this->getNewsCollection()->load();

        return $this;
    }

    /**
     * Get Pager Html
     *
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
