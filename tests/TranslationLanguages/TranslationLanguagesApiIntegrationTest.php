<?php

namespace Webit\WFirmaSDK\TranslationLanguages;

use Webit\WFirmaSDK\Entity\AbstractApiTestCase;
use Webit\WFirmaSDK\Entity\Parameters\Pagination;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;

class TranslationLanguagesApiIntegrationTest extends AbstractApiTestCase
{
    /** @var TranslationLanguagesApi */
    private $api;

    protected function setUp(): void
    {
        $this->api = new TranslationLanguagesApi($this->entityApi());
    }

    /**
     * @test
     */
    public function testFind()
    {
        foreach ($this->api->find() as $translationLanguage) {
            $this->assertInstanceOf('Webit\WFirmaSDK\TranslationLanguages\TranslationLanguage', $translationLanguage);
        }
    }


    /**
     * @test
     */
    public function testGet()
    {
        $translationLanguages = $this->api->find(
            Parameters::findParameters(
                null,
                null,
                new Pagination(1)
            )
        );

        $expectedLanguage = array_shift($translationLanguages);

        $this->assertEquals(
            $expectedLanguage,
            $this->api->get($expectedLanguage->id())
        );
    }
}
