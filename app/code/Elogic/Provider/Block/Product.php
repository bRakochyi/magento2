<?php

namespace Elogic\Provider\Block;

use Elogic\Provider\Model\ProviderRepository;

/**
 * Class Product
 * @package Elogic\Provider\Block
 */
class Product extends \Magento\Framework\View\Element\Template
{
    protected $_registry;

    protected $_storeManager;

    protected $scopeConfig;

    protected $providerRepository;


    /**
     * Product constructor.
     * @param ProviderRepository $providerRepository
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        ProviderRepository $providerRepository,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->providerRepository = $providerRepository;
        $this->_registry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * @return mixed|null
     */
    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }


    /**
     * @return mixed
     */
    public function getProviderId()
    {
        return $this->getCurrentProduct()->getProviderId();
    }


    /**
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getProvider()
    {
        $providerId = $this->getProviderId();
        return $this->providerRepository->getById($providerId);
    }


    /**
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getProviderImg()
    {
        $img = $this->getProvider()->getLogo();
        return "pub/media/elogic_provider/tmp/feature/" . $img;
    }

}
