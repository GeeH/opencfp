<?php

declare(strict_types=1);

/**
 * Copyright (c) 2013-2017 OpenCFP
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/opencfp/opencfp
 */

namespace OpenCFP\Console\Command;

use OpenCFP\Console\BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AdminPromoteCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:promote')
            ->setDefinition([
                new InputArgument('email', InputArgument::REQUIRED, 'Email address of user to promote to admin'),
            ])
            ->setDescription('Promote an existing user to be an admin')
            ->setHelp(
                <<<EOF
The <info>%command.name%</info> command promotes a user to the admin group for a given environment:

<info>php %command.full_name% speaker@opencfp.org --env=production</info>
<info>php %command.full_name% speaker@opencfp.org --env=development</info>
EOF
);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        return $this->promote($input, $output, 'Admin');
    }

    public function setApp($app)
    {
        $this->app = $app;
    }
}
