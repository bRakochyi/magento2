<?php
/**
 * Magento Controller Index Example
 *
 * @category Magento
 * @Package Magento/Practice
 * @author Bohdan Rakochyi
 * @copyright 2021 Magento
 */
namespace Magento\Practice\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class Example
 * @package Magento\Practice\Controller\Index
 */
class Example extends Action
{
    /**
     * @var $title
     */
    protected $title;

    /**
     * @return void
     */
    public function execute()
    {
        echo $this->setTitle('Welcome');
        echo $this->getTitle();
    }

    /**
     * @param $title
     * @return mixed
     */
    public function setTitle($title)
    {
        return $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
}
