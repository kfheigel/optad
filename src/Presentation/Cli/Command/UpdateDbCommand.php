<?php

declare(strict_types=1);

namespace App\Presentation\Cli\Command;

use App\Aplication\Command\UpdateDatabaseCommand;
use App\Aplication\Query\GetOptadInfoQuery;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'app:update-db',
    description: 'Syncing and updating database',
)]
class UpdateDbCommand extends Command
{
    public function __construct(
        GetOptadInfoQuery $query,
        MessageBusInterface $commandBus
    ) {
        parent::__construct();
        $this->query = $query;
        $this->commandBus = $commandBus;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $query = $this->query;
        $data = $query();

        $this->commandBus->dispatch(new UpdateDatabaseCommand($data));

        $io->success('Database synced!');

        return Command::SUCCESS;
    }
}
