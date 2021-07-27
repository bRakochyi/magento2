<?php
/**
 * Elogic Customers Repository
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Customers\Model;

use Elogic\Customers\Api\CustomersRepositoryInterface;
use Elogic\Customers\Api\Data\CustomersInterface;
use Elogic\Customers\Model\ResourceModel\Customers as ResourceCustomers;
use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\ValidatorException;

/**
 * Class CustomersRepository
 *
 * @package Elogic\Customers\Model
 */
class CustomersRepository implements CustomersRepositoryInterface
{
    /**
     * Resource Model Customers
     *
     * @var ResourceCustomers
     */
    protected $resource;

    /**
     * Customers Factory
     *
     * @var CustomersFactory
     */
    protected $customersFactory;

    /**
     * CustomersRepository constructor.
     *
     * @param ResourceCustomers $resource
     * @param CustomersFactory $customersFactory
     */
    public function __construct(
        ResourceCustomers $resource,
        CustomersFactory $customersFactory
    )
    {
        $this->resource = $resource;
        $this->customersFactory = $customersFactory;
    }

    /**
     * Get id
     *
     * @param int $id
     * @return CustomersInterface
     * @throws NoSuchEntityException
     */
    public function get(int $id)
    {
        $customers = $this->customersFactory->create();


        $customers->load($id);
        if (!$customers->getId()) {
            throw new NoSuchEntityException(__('Faq with id "%1" does not exist.', $id));
        }

        return $customers;
    }

    /**
     * Delete customers
     *
     * @param CustomersInterface $customers
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(CustomersInterface $customers)
    {
        try {
            $this->resource->delete($customers);
        } catch (Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Faq: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete with id
     *
     * @param int $id
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $id)
    {
        return $this->delete($this->get($id));
    }

    /**
     * Save customers
     *
     * @param CustomersInterface $customers
     * @return CustomersInterface
     * @throws CouldNotSaveException
     */
    public function save(CustomersInterface $customers)
    {
        try {
            $this->resource->save($customers);
        } catch (Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $customers;
    }
}
