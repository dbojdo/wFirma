<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Webit\WFirmaSDK\Entity\AbstractApiTestCase;
use Webit\WFirmaSDK\Entity\DefaultEntityApi;
use Webit\WFirmaSDK\Entity\Exception\ApiException;
use Webit\WFirmaSDK\Entity\Exception\NotFoundException;
use Webit\WFirmaSDK\Entity\Exception\ValidationException;
use Webit\WFirmaSDK\Module;
use Webit\WFirmaSDK\Entity\Parameters\Fields;
use Webit\WFirmaSDK\Entity\Parameters\Order;
use Webit\WFirmaSDK\Entity\Parameters\Pagination;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Invoices\SendParameters;
use Webit\WFirmaSDK\Series\ResetMode;
use Webit\WFirmaSDK\Series\Series;
use Webit\WFirmaSDK\Series\TemplateTokens;

class BuzzRequestExecutorIntegrationTest extends AbstractApiTestCase
{
    /** @var DefaultEntityApi */
    private $entityApi;

    /**
     * @var Series[]
     */
    private $series = array();

    protected function setUp()
    {
        $this->entityApi = $this->entityApi();
    }

    protected function tearDown()
    {
        foreach ($this->series as $series) {
            try {
                $this->entityApi->delete($series->id()->id(), Module::series());
            } catch (ApiException $e) {
            }
        }
    }

    /**
     * @test
     */
    public function it_adds_entity()
    {
        $series = new Series(
            $this->faker()->colorName . '_' . $this->faker()->randomNumber(),
            sprintf(
                'FV/I/Test_%s/%s/%s',
                $this->faker()->randomNumber(),
                TemplateTokens::year(),
                TemplateTokens::number()
            )
        );

        $this->assertInstanceOf('Webit\WFirmaSDK\Series\Series', $this->entityApi->add($series));
    }

    /**
     * @test
     */
    public function it_edits_entity()
    {
        $series = new Series(
            $this->faker()->colorName . '_' . $this->faker()->randomNumber(),
            sprintf(
                'FV/I/Test_%s/%s/%s',
                $this->faker()->randomNumber(),
                TemplateTokens::year(),
                TemplateTokens::number()
            )
        );

        /** @var Series $series */
        $this->series[] = $series = $this->entityApi->add($series);

        $series
            ->rename($this->faker()->colorName . '_' . $this->faker()->randomNumber())
            ->changeResetMode(ResetMode::monthly())
            ->changeTemplate(sprintf(
                'FV/I/Test_%s/%s/%s/%s',
                $this->faker()->randomNumber(),
                TemplateTokens::year(),
                TemplateTokens::month(true),
                TemplateTokens::number()
            ));

        $this->entityApi->edit($series);
    }

    /**
     * @test
     */
    public function it_finds_matching_entities()
    {
        $series = $this->entityApi->find(
            Module::series(),
            Parameters::findParameters(
                null,
                Order::descending('created'),
                new Pagination(2),
                Fields::fromArray(array('name'))
            )
        );

        $this->assertEquals(2, count($series));
    }

    /**
     * @test
     */
    public function it_finds_all_matching_entities()
    {
        $series = $this->entityApi->findAll(
            Module::series(),
            Parameters::findParameters(
                null,
                Order::descending('created'),
                new Pagination(10),
                Fields::fromArray(array('name'))
            )
        );

        $this->assertInstanceOf('Webit\WFirmaSDK\Entity\EntityIterator', $series);
        foreach ($series as $i => $objSeries) {
            $this->assertInstanceOf('Webit\WFirmaSDK\Series\Series',  $objSeries);
        }
    }

    /**
     * @test
     */
    public function it_gets_entity_by_id()
    {
        $series = new Series(
            $this->faker()->colorName . '_' . $this->faker()->randomNumber(),
            sprintf(
                'FV/I/Test_%s/%s/%s',
                $this->faker()->randomNumber(),
                TemplateTokens::year(),
                TemplateTokens::number()
            )
        );

        $this->assertEquals(
            $this->series[] = $series = $this->entityApi->add($series),
            $this->entityApi->get($series->id(), Module::series())
        );
    }

    /**
     * @test
     */
    public function it_counts_entities()
    {
        $this->assertGreaterThan(0, $this->entityApi->count(Module::series()));
    }

    /**
     * @test
     */
    public function it_deletes_entity()
    {
        $series = new Series(
            $this->faker()->colorName . '_' .$this->faker()->randomNumber(),
            sprintf(
                'FV/I/Test_%s/%s/%s',
                $this->faker()->randomNumber(),
                TemplateTokens::year(),
                TemplateTokens::number()
            )
        );

        /** @var Series $series */
        $this->series[] = $series = $this->entityApi->add($series);
        $this->entityApi->delete($series->id(), Module::series());

        try {
            $this->entityApi->get($series->id(), Module::series());
        } catch (NotFoundException $e) {
            $this->assertTrue(true);
            return;
        }

        $this->assertTrue(false, 'Given entity still exists.');
    }

    /**
     * @test
     */
    public function it_executes_action()
    {
        $parameters = new SendParameters(null, false, false);
        try {
            $this->entityApi->executeAction(
                Module::invoices(),
                'send',
                31946947,
                $parameters->toActionParameters()
            );
        } catch (ValidationException $e) {
            $this->assertTrue(true);
            return;
        }

        $this->assertTrue(false, 'Expected ValidationException has not been thrown.');
    }
}
