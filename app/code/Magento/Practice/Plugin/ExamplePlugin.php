<?php
/**
 * Magento Plugin ExamplePlugin
 *
 * @category Magento
 * @Package Magento/Practice
 * @author Bohdan Rakochyi
 * @copyright 2021 Magento
 */
namespace Magento\Practice\Plugin;

use Magento\Practice\Controller\Index\Example;

class ExamplePlugin
{
    /**
     * @param Example $subject
     * @param $title
     * @return string[]
     */
    public function beforeSetTitle(Example $subject, $title)
    {
        $title = $title . " to ";
        echo __METHOD__ . "</br>";

        return [$title];
    }

    /**
     * @param Example $subject
     * @param $result
     * @return string
     */
    public function afterGetTitle(Example $subject, $result)
    {
        echo __METHOD__ . "</br>";

        return '<h1>'. $result . 'Magento.com' .'</h1>';
    }

    /**
     * @param Example $subject
     * @param callable $proceed
     * @return mixed
     */
    public function aroundGetTitle(Example $subject, callable $proceed)
    {
        echo __METHOD__ . " - Before proceed() </br>";
        $result = $proceed();
        echo __METHOD__ . " - After proceed() </br>";

        return $result;
    }
}
