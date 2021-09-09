<?php
/**
 * Magento Model Indexer Test
 *
 * @category Magento
 * @Package Magento/Practice
 * @author Bohdan Rakochyi
 * @copyright 2021 Magento
 */
namespace Magento\Practice\Model\Indexer;

use Magento\Framework\Indexer\ActionInterface;

/**
 * Class Test
 *
 * @package Magento\Practice\Model\Indexer
 */
class Test implements ActionInterface, \Magento\Framework\Mview\ActionInterface
{
    /**
	 * Used by mview, allows process indexer in the "Update on schedule" mode
	 */
    public function execute($ids){

        //code here!
    }

    /**
     * Will take all of the data and reindex
     * Will run when reindex via command line
     */
    public function executeFull(){
        //code here!
    }


    /**
     * Works with a set of entity changed (may be massaction)
     */
    public function executeList(array $ids){
        //code here!
    }


    /**
     * Works in runtime for a single entity using plugins
     */
    public function executeRow($id){
        //code here!
    }
}
