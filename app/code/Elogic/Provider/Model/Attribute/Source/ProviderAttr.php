<?php
/**
 * Elogic Uploader
 *
 * @category Elogic
 * @Package Elogic/Provider
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Provider\Model\Attribute\Source;

use Elogic\Provider\Model\ResourceModel\Provider\CollectionFactory as ProviderCollectionFactory;
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Magento\Eav\Model\Entity\Attribute\Source\SourceInterface;
use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class ProviderAttr, source model for attribute
 *
 * @package Elogic\Provider\Model\Attribute\Source
 */
class ProviderAttr extends AbstractSource implements OptionSourceInterface, SourceInterface
{
    /**
     * @var ProviderCollectionFactory
     */
    protected $providerCollectionFactory;

    /**
     * ProviderAttr constructor.
     *
     * @param ProviderCollectionFactory $providerCollectionFactory
     */
    public function __construct(
        ProviderCollectionFactory $providerCollectionFactory
    ) {
        $this->providerCollectionFactory = $providerCollectionFactory;
    }

    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions(): array
    {
        $collection = $this->providerCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addIsActiveFilter();

        foreach ($collection as $category) {
            $options[] = [
                'value' => $category->getPostId(),
                'label' => $category->getName() . ' (ID:' . $category->getPostId() . ')'
            ];
        }
        return $options;
    }
}
