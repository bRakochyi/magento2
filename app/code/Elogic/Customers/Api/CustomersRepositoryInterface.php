<?php
/**
 * Elogic Customers Repository Interface
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */
namespace Elogic\Customers\Api;

use Elogic\Customers\Api\Data\CustomersInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Interface CustomersRepositoryInterface
 *
 * @package Elogic\Customers\Api
 */
interface CustomersRepositoryInterface
{
    /**
     * @param CustomersInterface $customers
     * @return CustomersInterface
     * @throws CouldNotSaveException
     */
    public function save(CustomersInterface $customers);

    /**
     * @param int $id
     * @return CustomersInterface
     * @throws CustomersInterface
     */
    public function get(int $id);

    /**
     * @param CustomersInterface $customers
     * @return CustomersInterface
     * @throws CouldNotDeleteException
     */
    public function delete(CustomersInterface $customers);

    /**
     * @param int $id
     * @return CustomersInterface
     * @throws CustomersInterface
     */
    public function deleteById(int $id);
}
