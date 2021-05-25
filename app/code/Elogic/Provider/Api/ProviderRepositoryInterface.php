<?php

namespace Elogic\Provider\Api;

/**
 * Interface ProviderRepositoryInterface
 * @package Elogic\Provider\Api
 */
interface ProviderRepositoryInterface
{
    /**
     * @param \Elogic\Provider\Api\Data\ProviderInterface|\Elogic\Provider\Model\Provider $model
     * @return \Elogic\Provider\Api\Data\ProviderInterface|\Elogic\Provider\Model\Provider mixed
     */
    public function save($model);


    /**
     * @param \Elogic\Provider\Api\Data\ProviderInterface|\Elogic\Provider\Model\Provider $model
     * @return true
     * @throw CouldNotDeleteException
     */
    public function delete($model);


    /**
     * @param integer $id
     * @return \Elogic\Provider\Api\Data\ProviderInterface|\Elogic\Provider\Model\Provider
     */
    public function getById($id);


    /**
     * @param integer $id
     * @return true
     * @throw CouldNotDeleteException
     */
    public function deleteById($id);


    /**
     * @param \Magento\Framework\Api\SearchCriteria $searchCriteria
     * @return \Magento\Framework\Api\SearchCriteriaInterface
     */
    public function getList($searchCriteria);
}
