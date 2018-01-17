<?php

namespace Webit\WFirmaSDK\TranslationLanguages;

use Webit\WFirmaSDK\AbstractSerialisationTest;
use Webit\WFirmaSDK\Module;

class TranslationLanguageSerialisationTest extends AbstractSerialisationTest
{
    /**
     * @inheritdoc
     */
    protected function module()
    {
        return Module::translationLanguages();
    }

    /**
     * @test
     */
    public function translation_language_deserialisation()
    {
        $xml = <<<XML
<translation_language>
    <id>1</id>
    <name>pol-ang</name>
    <code>en</code>
    <active>1</active>
</translation_language>
XML;
        /** @var TranslationLanguage $translationLanguage */
        $translationLanguage = $this->deserialiseEntity($xml);

        $this->assertEquals(TranslationLanguageId::create(1), $translationLanguage->id());
        $this->assertSame('pol-ang', $translationLanguage->name());
        $this->assertSame('en', $translationLanguage->code());
        $this->assertSame(true, $translationLanguage->active());
    }
}
