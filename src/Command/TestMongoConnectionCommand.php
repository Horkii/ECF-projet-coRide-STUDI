<?php
// src/Command/TestMongoConnectionCommand.php

namespace App\Command;

use MongoDB\Client as MongoClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\DependencyInjection\Attribute\AsService;

#[AsService]  // Nouvelle annotation Symfony pour déclarer un service automatiquement
class TestMongoConnectionCommand extends Command
{
    private MongoClient $mongoClient;

    public function __construct(MongoClient $mongoClient)
    {
        parent::__construct();
        $this->mongoClient = $mongoClient;
    }

    protected function configure()
    {
        $this->setName('mongodb:test-connection')
            ->setDescription('Teste la connexion à MongoDB')
            ->addOption('details', null, InputOption::VALUE_NONE, 'Affiche des informations détaillées sur le serveur MongoDB');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            // Tester la connexion en demandant des informations sur le serveur MongoDB
            $serverStatus = $this->mongoClient->selectDatabase('admin')->command(['serverStatus' => 1]);

            if ($serverStatus) {
                $output->writeln('<info>Connexion à MongoDB réussie !</info>');
                if ($input->getOption('details')) {
                    $output->writeln('<comment>Informations serveur MongoDB :</comment>');
                    $output->writeln(print_r($serverStatus, true));
                }
            } else {
                $output->writeln('<error>Échec de la connexion à MongoDB !</error>');
                return Command::FAILURE;
            }

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln('<error>Erreur lors de la connexion à MongoDB: ' . $e->getMessage() . '</error>');
            return Command::FAILURE;
        }
    }
}
