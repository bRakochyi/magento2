<?php
/**
 * Elogic Controller News
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Controller;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Elogic\News\Helper\Data;
use Elogic\News\Model\NewsFactory;

/**
 * Class News
 *
 * @package Elogic\News\Controller
 */
class News extends Action
{
    /**
     * Property for Page Factory
     *
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * Property for Elogic Helper Data
     *
     * @var Data
     */
    protected $_dataHelper;

    /**
     * Property for News Factory
     *
     * @var NewsFactory
     */
    protected $_newsFactory;

    /**
     * News construct
     *
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param Data $dataHelper
     * @param NewsFactory $newsFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Data $dataHelper,
        NewsFactory $newsFactory
    ) {
        parent::__construct($context);
        $this->_pageFactory = $pageFactory;
        $this->_dataHelper = $dataHelper;
        $this->_newsFactory = $newsFactory;
    }

    /**
     * Dispatch request
     *
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws NotFoundException
     */
    public function dispatch(RequestInterface $request)
    {
        // Check this module is enabled in frontend
        if ($this->_dataHelper->isEnabledInFrontend()) {
            $result = parent::dispatch($request);
            return $result;
        } else {
            $this->_forward('noroute');
        }
    }

    /**
     * Execute page
     *
     * @return ResultInterface|Page
     */
    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
