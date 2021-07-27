<?php
/**
 * Elogic registration
 *
 * @category Elogic
 * @Package Elogic/Customers
 * @author Bohdan Rakochyi
 * @copyright 2021 Elogic
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Elogic_Customers',
    __DIR__
);
