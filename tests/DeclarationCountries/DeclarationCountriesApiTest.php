<?php

namespace Webit\WFirmaSDK\DeclarationCountries;

use Webit\WFirmaSDK\Entity\AbstractApiTestCase;

class DeclarationCountriesApiTest extends AbstractApiTestCase
{
    /**
     * @var DeclarationCountriesApi
     */
    private $declarationCountriesApi;

    protected function setUp()
    {
        $this->declarationCountriesApi = new DeclarationCountriesApi(
            $this->entityApi()
        );
    }

    /**
     * @test
     */
    public function it_gets_declaration_country()
    {
        $country = $this->declarationCountriesApi->get(DeclarationCountryId::create(20));
        $this->assertInstanceOf('Webit\WFirmaSDK\DeclarationCountries\DeclarationCountry', $country);
    }

    /**
     * @test
     */
    public function it_finds_declaration_country()
    {
        foreach ($this->declarationCountriesApi->find() as $i => $country) {
            $this->assertInstanceOf('Webit\WFirmaSDK\DeclarationCountries\DeclarationCountry', $country);
        }
    }

    /**
     * @test
     */
    public function it_finds_all_declaration_country()
    {
        foreach ($this->declarationCountriesApi->findAll() as $i => $country) {
            $this->assertInstanceOf('Webit\WFirmaSDK\DeclarationCountries\DeclarationCountry', $country);
        }
    }

    /**
     * @test
     */
    public function it_counts_declaration_countries()
    {
        $this->assertInternalType('integer', $this->declarationCountriesApi->count());
    }
}
