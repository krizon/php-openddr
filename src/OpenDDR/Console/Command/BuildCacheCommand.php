<?php

namespace OpenDDR\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BuildCacheCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('openddr:build-cache')
            ->setDescription('Rebuild the cache from the OpenDDR source files')
            ->addOption('force', 'f', InputOption::VALUE_NONE, 'Force rebuild of cache');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $storageManager = $this->getHelper('storage_manager')->getStorageManager();
        $force = $input->getOption('force');

        if ($force) {
            $output->writeln('Starting forced rebuild of cache...');
            $storageManager->rebuild();
            $output->writeln('Rebuild done.');
        } else {
            $output->writeln('Checking current cache status...');
            if ($storageManager->needsRebuild()) {
                $output->writeln('Rebuild needed! Starting...');
                $storageManager->rebuild();
                $output->writeln('Rebuild done.');
            } else {
                $output->writeln('Cache is still fresh! Use <info>--force</info> option to force rebuilding.');
            }
        }


    }
}
