<?php
/**
 * Elogic Reset Button
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
 * Class ResetButton
 *
 * @package Elogic\Customers\Block\Adminhtml\Customers\Edit
 */
class ResetButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Get button-specified settings
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'location.reload();',
            'sort_order' => 30
        ];
    }
}
