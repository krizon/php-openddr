<?php

namespace OpenDDR\Console;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Helper\HelperSet;
use OpenDDR\Console\Command\BuildCacheCommand;

class CommandRunner
{
    public static function run(HelperSet $helperSet)
    {
        $application = new Application('OpenDDR Console Interface');
        $application->setHelperSet($helperSet);
        $application->setCatchExceptions(false);
        self::addCommands($application);
        $application->run();
    }

    public static function addCommands(Application $application)
    {
        $application->addCommands(array(
            new BuildCacheCommand()
        ));
    }
}