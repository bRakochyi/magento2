<?php
/**
 * Elogic Back Button
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Block\Adminhtml\News\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Elogic\News\Block\Adminhtml\News\Edit\GenericButton;

/**
 * Class BackButton
 *
 * @package Elogic\News\Block\Adminhtml\News\Edit
 */
class BackButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Get button-specified settings
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10
        ];
    }

    /**
     * Get URL for back button
     *
     * @return string
     */
    public function getBackUrl(): string
    {
        return $this->getUrl('*/*/');
    }
}
