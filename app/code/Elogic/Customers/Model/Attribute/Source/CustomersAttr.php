<?php
/**
 * Elogic Source Customers Attribute
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Customers\Model\Attribute\Source;

use Elogic\Customers\Model\ResourceModel\Customers\CollectionFactory;
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Magento\Eav\Model\Entity\Attribute\Source\SourceInterface;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Eav\Model\ResourceModel\Entity\Attribute\OptionFactory;
use Magento\Framework\DB\Ddl\Table;

/**
 * Class ProviderAttr, source model for attribute
 *
 * @package Elogic\Provider\Model\Attribute\Source
 */
class CustomersAttr extends AbstractSource implements OptionSourceInterface, SourceInterface
{
    /**
     * @var OptionFactory
     */

    public $collection;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var OptionFactory
     */
    protected OptionFactory $optionFactory;

    /**
     * Options constructor.
     * @param OptionFactory $optionFactory
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        OptionFactory $optionFactory,
        CollectionFactory $collectionFactory
    )
    {
        $this->collection = $collectionFactory->create();
        $this->optionFactory = $optionFactory;
    }

    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        $items = $this->collection->getItems();

        foreach ($items as $item) {
            if ($item['status'] == 1) {
                $this->_options[] = [
                    'label' => __($item['name']),
                    'value' => $item['customer_id'],
                ];
            }
        }
        return $this->_options;
    }

    /**
     * Get a text for option value
     *
     * @param string|integer $value
     * @return string|bool
     */
    public function getOptionText($value)
    {
        foreach ($this->getAllOptions() as $option) {
            if ($option['value'] == $value) {
                return $option['label'];
            }
        }
        return false;
    }

    /**
     * Retrieve flat column definition
     *
     * @return array
     */
    public function getFlatColumns()
    {
        $attributeCode = $this->getAttribute()->getAttributeCode();
        return [
            $attributeCode => [
                'unsigned' => false,
                'default' => null,
                'extra' => null,
                'type' => Table::TYPE_INTEGER,
                'nullable' => true,
                'comment' => 'Custom Attribute Options  ' . $attributeCode . ' column',
            ],
        ];
    }
}
