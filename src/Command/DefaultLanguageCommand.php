<?php

namespace App\Command;

use App\Entity\Language;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(
    name: "default:language",
    description: "Default language pl,de,en",
)]
class DefaultLanguageCommand extends Command
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private EntityManagerInterface $entityManager
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
            $language = new Language();
            $language->setName('Poland');
            $language->setFlag('https://flagcdn.com/pl.svg');
            $language->setCode('pl');
            $this->entityManager->persist($language);
            $this->entityManager->flush();

            $language = new Language();
            $language->setName('Germany');
            $language->setFlag('https://flagcdn.com/de.svg');
            $language->setCode('de');
            $this->entityManager->persist($language);
            $this->entityManager->flush();

            $language = new Language();
            $language->setName('English');
            $language->setFlag('https://flagcdn.com/gb.svg');
            $language->setCode('en');
            $this->entityManager->persist($language);
            $this->entityManager->flush();

        $output->writeln('Default language saved successfully!');

        return Command::SUCCESS;
    }
}
