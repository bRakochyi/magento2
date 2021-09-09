<?php
/**
 * Elogic Reset Button
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Block\Adminhtml\News\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Elogic\News\Block\Adminhtml\News\Edit\GenericButton;

/**
 * Class ResetButton
 *
 * @package Elogic\News\Block\Adminhtml\News\Edit
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
