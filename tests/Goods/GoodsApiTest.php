<?php

namespace Webit\WFirmaSDK\Goods;

use Webit\WFirmaSDK\Entity\AbstractApiTestCase;
use Webit\WFirmaSDK\Entity\Exception\NotFoundException;
use Webit\WFirmaSDK\Vat\VatRateCode;

class GoodsApiTest extends AbstractApiTestCase
{
    /** @var GoodsApi */
    private $api;

    /** @var Good[] */
    private $goods;

    protected function setUp(): void
    {
        $this->api = new GoodsApi($this->entityApi());
    }

    public function tearDown(): void
    {
        foreach ($this->goods as $good) {
            try {
                $this->api->delete($good->id());
            } catch (NotFoundException $e) {
                continue;
            }
        }
    }

    public function testAdd(): void
    {
        $good = $this->createGood();

        $this->goods[] = $createdGood = $this->api->add($good);
        $this->assertGood($good, $createdGood);
        $this->assertInstanceOf(Good::class, $createdGood);
    }

    public function testEdit(): void
    {
        $this->goods[] = $good = $this->api->add($this->createGood());

        $good->setName($newName = $this->faker()->streetName);
        $editedGood = $this->api->edit($good);
        $this->assertEquals($newName, $editedGood->name());
    }

    public function testDelete(): void
    {
        $this->goods[] = $good = $this->api->add($this->createGood());
        $this->api->delete($good->id());

        $this->expectException(NotFoundException::class);
        $this->api->get($good->id());
    }

    private function assertGood(Good $expected, Good $actual): void
    {
        $this->assertEquals($expected->name(), $actual->name());
        $this->assertEquals($expected->code(), $actual->code());
        $this->assertEquals($expected->description(), $actual->description());
        $this->assertEquals($expected->type(), $actual->type());
        $this->assertEquals($expected->priceType(), $actual->priceType());

        if ($expected->price()->priceType() == PriceType::netto()) {
            $this->assertEquals($expected->netto(), $actual->netto());
            $this->assertNotNull($actual->brutto());
        } else {
            $this->assertEquals($expected->brutto(), $actual->brutto());
            $this->assertNotNull($actual->netto());
        }
    }

    private function createGood(): Good
    {
        $netAmount = $this->faker()->randomNumber(5);

        return new Good(
            $this->faker()->colorName,
            'usługa',
            Price::createFromNetPrice($netAmount, VatRateCode::E()),
            $this->faker()->word,
            Type::service(),
            null,
            $this->faker()->sentence,
            new Dimensions(24.5, 12.3, 11.1, 10.9)
        );
    }
}
