<?php

namespace Webit\WFirmaSDK\DeclarationCountries;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Entity\EntityIterator;
use Webit\WFirmaSDK\Module;
use Webit\WFirmaSDK\Entity\Entity;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;

class DeclarationCountriesApi
{
    /** @var EntityApi */
    private $entityApi;

    public function __construct(EntityApi $entityApi)
    {
        $this->entityApi = $entityApi;
    }

    /**
     * @param Parameters|null $parameters
     * @return DeclarationCountry[]|Entity[]
     */
    public function find(Parameters $parameters = null) {
        return $this->entityApi->find(Module::declarationCountries(), $parameters);
    }

    /**
     * @param Parameters|null $parameters
     * @return DeclarationCountry[]|Entity[]|EntityIterator
     */
    public function findAll(Parameters $parameters = null)
    {
        return $this->entityApi->findAll(Module::declarationCountries(), $parameters);
    }

    /**
     * @param DeclarationCountryId $id
     * @return DeclarationCountry|Entity
     */
    public function get(DeclarationCountryId $id)
    {
        return $this->entityApi->get($id->id(), Module::declarationCountries());
    }

    /**
     * @param Parameters|null $parameters
     * @return int
     */
    public function count(Parameters $parameters = null)
    {
        return $this->entityApi->count(Module::declarationCountries(), $parameters);
    }
}