<?php

namespace Elogic\Provider\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class ProviderList
 * @package Elogic\Provider\Block
 */
class ProviderList extends \Magento\Framework\View\Element\Template
{
    /**
     * ProviderList constructor.
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->setData('provider', []);
    }

    /**
     * @param $count
     */
    public function addProvider($count)
    {
        $_provider = $this->getData('provider');
        $actualNumber = count($_provider);
        $names = [];
        for($i=$actualNumber;$i<($actualNumber+$count);$i++) {
            $_provider[] = 'nom '.($i+1);
        }
        $this->setData('provider',$_provider);
    }
}
