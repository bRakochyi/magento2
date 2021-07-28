<?php
/**
 * Magento Module Registration
 *
 * @category Magento
 * @Package Magento/Practice
 * @author Bohdan Rakochyi
 * @copyright 2021 Magento
 */
use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Magento_Practice',
    __DIR__
);
