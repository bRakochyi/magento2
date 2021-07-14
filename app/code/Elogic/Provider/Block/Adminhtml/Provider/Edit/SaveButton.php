<?php
/**
 * Elogic Save Button
 *
 * @category Elogic
 * @Package Elogic/Provider
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Provider\Block\Adminhtml\Provider\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Elogic\Provider\Block\Adminhtml\Provider\Edit\GenericButton;

/**
 * Class SaveButton
 * @package Elogic\Provider\Block\Adminhtml\Provider\Edit
 */
class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Get button-specified settings
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label' => __('Save Provider'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
