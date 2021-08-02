<?php
/**
 * Elogic Delete Button
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Block\Adminhtml\News\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Elogic\News\Block\Adminhtml\News\Edit\GenericButton;

/**
 * Class DeleteButton
 *
 * @package Elogic\News\Block\Adminhtml\News\Edit
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData(): array
    {
        $data = [];
        if ($this->getId()) {
            $data = [
                'label' => __('Delete News'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\''
                    . __('Are you sure you want to delete this news ?')
                    . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * Get URL for delete button
     *
     * @return string
     */
    public function getDeleteUrl(): string
    {
        return $this->getUrl('*/*/delete', ['news_id' => $this->getId()]);
    }
}
