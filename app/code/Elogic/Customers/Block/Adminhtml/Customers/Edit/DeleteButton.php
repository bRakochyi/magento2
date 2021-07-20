<?php
/**
 * Elogic Delete Button
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Customers\Block\Adminhtml\Customers\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Elogic\Customers\Block\Adminhtml\Customers\Edit\GenericButton;

/**
 * Class DeleteButton
 *
 * @package Elogic\Customers\Block\Adminhtml\Customers\Edit
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
                'label' => __('Delete Customers'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\''
                    . __('Are you sure you want to delete this customer ?')
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
        return $this->getUrl('*/*/delete', ['customer_id' => $this->getId()]);
    }
}
