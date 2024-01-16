<?php
declare(strict_types=1);

namespace App\Console;

use Apex\Cli\{Cli, CliHelpScreen};
use Apex\Cli\Interfaces\CliCommandInterface;

/**
 * Example
 *
 * For full information on REST API, please visit the /docs/cli/api.md page.
 */
class Example implements CliCommandInterface
{

    /**
     * Process
     */
    public function process(Cli $cli, array $args):void
    {
        $name = $args[0] ?? 'there';
        $cli->send("Hi $name, this is an example CLI command.  Please check the /docs/ directory of Levis for details on creating your own CLi commands.\n\n");
    }

    /**
     * Help
     */
    public function help(Cli $cli):CliHelpScreen
    {

        $help = new CliHelpScreen(
            title: 'Example Command',
            usage: './levis example [<NAME>]',
            description: 'Example CLI command that simply echos the name you provide as an argument.'
        );

        $help->addParam('name', "Optional name to echo.");
        $help->addExample('./levis example John');

        return $help;
    }

}



