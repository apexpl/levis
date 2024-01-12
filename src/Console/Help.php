<?php
declare(strict_types=1);

namespace App\Console;

use Apex\Cli\{Cli, CliHelpScreen};

/**
 * Help
     */
class Help
{

    /**
     * Help
     */
    public function help(Cli $cli):CliHelpScreen
    {

        $help = new CliHelpScreen(
            title: 'Example Command List',
            usage: './levis <COMMAND> [<ARGS>]',
            description: 'An example help list of commands.'
        );
        $help->setParamsTitle('COMMANDS');
        $help->addParam('example', "Example CLI command that echos name provided.");

        return $help;
    }

}

