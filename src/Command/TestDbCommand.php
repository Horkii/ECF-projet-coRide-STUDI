<?php

namespace App\Command;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'app:test-db', description: 'Test de la connexion à la base de données')]
class TestDbCommand extends Command
{
    public function __construct(private ManagerRegistry $doctrine)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        try {
            $entityManager = $this->doctrine->getManager();
            $connection = $entityManager->getConnection();
            $connection->executeQuery('SELECT 1');
            $io->success('Connexion à la base de données réussie.');
        } catch (\Exception $e) {
            $io->error('Erreur de connexion : ' . $e->getMessage());
        }

        return Command::SUCCESS;
    }
}
