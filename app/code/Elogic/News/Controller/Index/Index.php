<?php
/**
 * Elogic Controller Index
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Controller\Index;

use Elogic\News\Controller\News;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\Theme\Block\Html\Breadcrumbs;

/**
 * Class Index
 *
 * @package Elogic\News\Controller\Index
 */
class Index extends News
{
    /**
     * Execute page
     *
     * @return ResultInterface|Page
     */
    public function execute()
    {
        $pageFactory = $this->_pageFactory->create();

        /**
         * Add title which is got by the configuration via backend
         */
        $pageFactory->getConfig()->getTitle()->set(
            $this->_dataHelper->getHeadTitle()
        );

        /**
         * Add breadcrumb
         *
         * @var Breadcrumbs
         */
        $breadcrumbs = $pageFactory->getLayout()->getBlock('breadcrumbs');
        $breadcrumbs->addCrumb('home',
            [
                'label' => __('Home'),
                'title' => __('Home'),
                'link' => $this->_url->getUrl('')
            ]
        );
        $breadcrumbs->addCrumb('news',
            [
                'label' => __('News Section'),
                'title' => __('News Section')
            ]
        );

        return $pageFactory;
    }
}
