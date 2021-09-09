<?php
/**
 * Magento Console SayHello
 *
 * @category Magento
 * @Package Magento/Practice
 * @author Bohdan Rakochyi
 * @copyright 2021 Magento
 */
namespace Magento\Practice\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class SayHello
 *
 * @package Magento\Practice\Console
 */
class SayHello extends Command
{
    /**
     * Constant Name
     */
    const NAME = 'name';

    /**
     * Configure Method
     */
    protected function configure()
    {
        $options = [
            new InputOption(
                self::NAME,
                null,
                InputOption::VALUE_REQUIRED,
                'Name'
            )
        ];

        $this->setName('example:sayhello')
            ->setDescription('Demo command line')
            ->setDefinition($options);
        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return $this
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($name = $input->getOption(self::NAME)) {

            $output->writeln("Hello " . $name);
        } else {
            $output->writeln("Hello World");
        }
        return $this;
    }
}
