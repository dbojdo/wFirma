<?php

namespace Webit\WFirmaSDK\TranslationLanguages;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Module;

class TranslationLanguagesApi
{
    /** @var EntityApi */
    private $entityApi;

    public function __construct(EntityApi $entityApi)
    {
        $this->entityApi = $entityApi;
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|TranslationLanguage[]
     */
    public function find(Parameters $parameters = null)
    {
        return $this->entityApi->find(Module::translationLanguages(), $parameters);
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|\Webit\WFirmaSDK\Entity\EntityIterator|TranslationLanguage[]
     */
    public function findAll(Parameters $parameters = null)
    {
        return $this->entityApi->findAll(Module::translationLanguages(), $parameters);
    }

    /**
     * @param TranslationLanguageId $id
     * @return \Webit\WFirmaSDK\Entity\Entity|TranslationLanguage
     */
    public function get(TranslationLanguageId $id)
    {
        return $this->entityApi->get($id->id(), Module::translationLanguages());
    }

    /**
     * @param Parameters|null $parameters
     * @return int
     */
    public function count(Parameters $parameters = null)
    {
        return $this->entityApi->count(Module::translationLanguages(), $parameters);
    }
}