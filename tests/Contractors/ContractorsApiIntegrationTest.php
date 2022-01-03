<?php

namespace Webit\WFirmaSDK\Contractors;

use Webit\WFirmaSDK\Entity\AbstractApiTestCase;
use Webit\WFirmaSDK\Entity\Exception\NotFoundException;
use Webit\WFirmaSDK\Payments\PaymentMethod;
use Webit\WFirmaSDK\Module;
use Webit\WFirmaSDK\TranslationLanguages\TranslationLanguageId;

class ContractorsApiIntegrationTest extends AbstractApiTestCase
{
    /** @var ContractorsApi */
    private $api;

    /** @var Contractor[] */
    private $contractors = array();

    protected function setUp(): void
    {
        $this->api = new ContractorsApi($this->entityApi());
    }

    public function tearDown(): void
    {
        foreach ($this->contractors as $contractor) {
            $this->api->delete($contractor->id());
        }
    }

    /**
     * @test
     */
    public function testAdd()
    {
        $contractor = $this->createContractor();

        $this->contractors[] = $createdContractor = $this->api->add($contractor);

        $this->assertContractor($createdContractor, $createdContractor);
    }

    /**
     * @test
     */
    public function testEdit()
    {
        $contractor = $this->createContractor();

        $this->contractors[] = $createdContractor = $this->api->add($contractor);

        $createdContractor->changeAccountNumber($this->faker()->bankAccountNumber);
        $createdContractor->changeContactAddress(
            new ContactAddress(
                $this->faker()->company,
                $this->faker()->streetAddress,
                $this->faker()->postcode,
                $this->faker()->city,
                'PL',
                $this->faker()->name
            )
        );

        $createdContractor->changeContactDetails(
            new ContactDetails(
                $this->faker()->phoneNumber,
                $this->faker()->colorName,
                $this->faker()->phoneNumber,
                $this->faker()->email,
                substr($this->faker()->url, 7)
            )
        );

        $createdContractor->changePaymentSettings(
            new PaymentSettings(
                mt_rand(0, 30),
                PaymentMethod::cash(),
                mt_rand(0, 10),
                $this->faker()->boolean
            )
        );

        $createdContractor->rename($this->faker()->company, $this->faker()->company);
        $createdContractor->changeBuyer($this->faker()->boolean);
        $createdContractor->changeSeller($this->faker()->boolean);
        $createdContractor->changeDescription($this->faker()->colorName);

        $editedContractor = $this->api->edit($createdContractor);

        $this->assertContractor($createdContractor, $editedContractor);
    }

    /**
     * @test
     */
    public function testDelete()
    {
        $contractor = $this->createContractor();

        $createdContractor = $this->api->add($contractor);
        $this->api->delete($createdContractor->id());

        try {
            $this->api->get($createdContractor->id());
        } catch (NotFoundException $e) {
            $this->assertTrue(true);
            return;
        }

        $this->assertTrue(false, 'Contractor still exists.');
    }

    /**
     * @test
     */
    public function testCount()
    {
        $this->contractors[] = $this->api->add($this->createContractor());
        $this->contractors[] = $this->api->add($this->createContractor());

        $this->assertGreaterThanOrEqual(2, $this->api->count());
    }

    /**
     * @test
     */
    public function testGet()
    {
        $contractor = $this->contractors[] = $this->api->add($this->createContractor());

        $foundContractor = $this->api->get($contractor->id());
        $this->assertContractor($contractor, $foundContractor);
    }

    /**
     * @test
     */
    public function testFind()
    {
        $this->contractors[] = $this->api->add($this->createContractor());
        $this->contractors[] = $this->api->add($this->createContractor());

        $contractors = $this->api->find();
        foreach ($contractors as $contractor) {
            $this->assertInstanceOf(Module::contractors()->entityClass(), $contractor);
        }
    }

    /**
     * @test
     */
    public function testFindAll()
    {
        $contractors = $this->api->findAll();
        $this->assertInstanceOf('Webit\WFirmaSDK\Entity\EntityIterator', $contractors);
    }

    private function assertContractor(Contractor $expected, Contractor $actual)
    {
        $this->assertSame($expected->name(), $actual->name());
        $this->assertSame($expected->altName(), $actual->altName());
        $this->assertSame($expected->nip(), $actual->nip());
        $this->assertSame($expected->regon(), $actual->regon());
        $this->assertEquals($expected->invoiceAddress(), $actual->invoiceAddress());
        $this->assertEquals($expected->contactAddress(), $actual->contactAddress());

        $expectedContactDetails = $expected->contactDetails();
        $expectedContactDetails = $expectedContactDetails->withPhone(
            preg_replace('/\D/', '', $expectedContactDetails->phone())
        );

        $this->assertEquals($expectedContactDetails, $actual->contactDetails());
        $this->assertSame($expected->description(), $actual->description());
        $this->assertSame($expected->buyer(), $actual->buyer());
        $this->assertSame($expected->seller(), $actual->seller());
        $this->assertSame($expected->accountNumber(), $actual->accountNumber());
        $this->assertEquals($expected->paymentSettings(), $actual->paymentSettings());
        $this->assertEquals($expected->taxIdType(), $actual->taxIdType());
        $this->assertEquals($expected->translationLanguageId(), $actual->translationLanguageId());
    }

    private function createContractor()
    {
        return new Contractor(
            $this->faker()->company,
            $this->faker()->company,
            '1234563218',
            '123456785',
            new InvoiceAddress(
                $this->faker()->streetAddress,
                $this->faker()->postcode,
                $this->faker()->city,
                'PL'
            ),
            new ContactAddress(
                $this->faker()->company,
                $this->faker()->streetAddress,
                $this->faker()->postcode,
                $this->faker()->city,
                'PL',
                $this->faker()->name
            ),
            new ContactDetails(
                $this->faker()->phoneNumber,
                $this->faker()->colorName,
                $this->faker()->phoneNumber,
                $this->faker()->email,
                substr($this->faker()->url, 7)
            ),
            $this->faker()->colorName,
            $this->faker()->boolean,
            $this->faker()->boolean,
            $this->faker()->bankAccountNumber,
            new PaymentSettings(
                14,
                PaymentMethod::transfer(),
                10,
                true
            ),
            TaxIdType::nip(),
            null,
            new TranslationLanguageId(1)
        );
    }
}
