<?php

namespace Elogic\Provider\Api\Data;

/**
 * Interface ProviderInterface
 * @package Elogic\Provider\Api\Data
 */
interface ProviderInterface
{
    const TABLE_NAME = 'elogic_providers';

    const FIELD_NAME_ID = 'id';
    const FIELD_NAME_NAME = 'name';
    const FIELD_NAME_DESCRIPTION = 'description';
    const FIELD_NAME_DATE_ADDED = 'date_added';
    const FIELD_NAME_LOGO = 'logo';


    /**
     * @return integer
     */
    public function getId();


    /**
     * @return string
     */
    public function getName();


    /**
     * @param string $name
     * @return \Elogic\Provider\Api\Data\ProviderInterface|\Elogic\Provider\Model\Provider
     */
    public function setName($name);


    /**
     * @return mixed
     */
    public function getDescription();


    /**
     * @param $description
     * @return \Elogic\Provider\Api\Data\ProviderInterface|\Elogic\Provider\Model\Provider
     */
    public function setDescription($description);


    /**
     * @return string
     */
    public function getDateAdded();


    /**
     * @return string
     */
    public function getLogo();


    /**
     * @param $logo
     * @return \Elogic\Provider\Api\Data\ProviderInterface|\Elogic\Provider\Model\Provider
     */
    public function setLogo($logo);
}
