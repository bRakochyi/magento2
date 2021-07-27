<?php
/**
 * Elogic Uploader
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Customers\Controller\Adminhtml\Index;

use Exception;
use Elogic\Customers\Model\PhotoUploader;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class Uploader
 *
 * @package Elogic\Customers\Controller\Adminhtml\Index
 */
class Uploader extends Action implements HttpPostActionInterface
{
    /**
     * Photo uploader
     *
     * @var PhotoUploader
     */
    public PhotoUploader $photoUploader;

    /**
     * Upload constructor.
     *
     * @param Context $context
     * @param PhotoUploader $photoUploader
     */
    public function __construct(
        Context $context,
        PhotoUploader $photoUploader
    ) {
        parent::__construct($context);
        $this->photoUploader = $photoUploader;
    }
    /**
     * Upload file controller action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        try {
            $result = $this->photoUploader->saveFileToTmpDir('photo');
            $result['cookie'] = [
                'name' => $this->_getSession()->getName(),
                'value' => $this->_getSession()->getSessionId(),
                'lifetime' => $this->_getSession()->getCookieLifetime(),
                'path' => $this->_getSession()->getCookiePath(),
                'domain' => $this->_getSession()->getCookieDomain(),
            ];
        } catch (Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}
