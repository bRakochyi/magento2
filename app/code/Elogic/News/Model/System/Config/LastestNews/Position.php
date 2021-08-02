<?php
/**
 * Elogic Position
 *
 * @category Elogic
 * @Package Elogic/News
 * @copyright 2021 Elogic
 */
namespace Elogic\News\Model\System\Config\LastestNews;

use Magento\Framework\Option\ArrayInterface;
/**
 * Class Position
 *
 * @package Elogic\News\Model\System\Config\LastestNews
 */
class Position implements ArrayInterface
{
    /**
     * Constant for the position on the left
     */
    const LEFT      = 1;

    /**
     * Constant for the position on the right
     */
    const RIGHT     = 2;

    /**
     * Constant for the position disable
     */
    const DISABLED  = 0;

    /**
     * Get positions of lastest news block
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            self::LEFT => __('Left'),
            self::RIGHT => __('Right'),
            self::DISABLED => __('Disabled')
        ];
    }
}
