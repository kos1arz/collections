<?php

namespace App\Command;

use App\Entity\Currency;
use App\Entity\Country;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(
    name: "app:fetch-countries",
    description: "Fetches and stores all world currencies and country using the restcountries API",
)]
class FetchCountriesCommand extends Command
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
        $response = $this->httpClient->request('GET', 'https://restcountries.com/v3.1/all');
        $defaultCountry = ['GBR', 'PLN', 'USA'];
        $defaultCurrency = ['PLN', 'USD', 'USA'];

        $countriesData = $response->toArray();

        $currenciesRepo = $this->entityManager->getRepository(Currency::class);

        foreach ($countriesData as $countryData) {
            if (isset($countryData['currencies'])) {
                foreach ($countryData['currencies'] as $code => $currencyData) {
                    $currency = $currenciesRepo->findOneBy(['code' => $code]);

                    if (!$currency) {
                        $currency = new Currency();
                        $currency->setName($currencyData['name'] ?? '');
                        $currency->setSymbol($currencyData['symbol'] ?? '');
                        $currency->setCode($code);
                        if(in_array($code, $defaultCurrency)) {
                            $currency->setActive(true);
                        }
                        $this->entityManager->persist($currency);
                        $this->entityManager->flush();
                    }
                }

                $country = new Country();
                $country->setName($countryData['name']['common'] ?? '');
                $country->setFlag($countryData['flags']['svg'] ?? '');
                $country->setCca2($countryData['cca2'] ?? '');
                $cca3 = $countryData['cca3'] ?? '';
                $country->setCca3($cca3);

                if(in_array($cca3, $defaultCountry)) {
                    $country->setActive(true);
                }

                $country->setCurrency($currency);
                $this->entityManager->persist($country);
                $this->entityManager->flush();
            }
        }

        $output->writeln('Countries and currencies saved successfully!');

        return Command::SUCCESS;
    }
}
