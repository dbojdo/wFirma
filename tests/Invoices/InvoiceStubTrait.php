<?php

namespace Webit\WFirmaSDK\Invoices;

use Faker\Generator;
use Webit\WFirmaSDK\Contractors\ContactAddress;
use Webit\WFirmaSDK\Contractors\Contractor;
use Webit\WFirmaSDK\Contractors\InvoiceAddress;
use Webit\WFirmaSDK\Payments\PaymentMethod;
use Webit\WFirmaSDK\Series\SeriesId;

/**
 * @method Generator faker
 */
trait InvoiceStubTrait
{
    private function newInvoice(SeriesId $seriesId = null, ?string $currency = null): Invoice
    {
        $invoice = Invoice::forContractor(
            $this->newContractor(),
            Payment::create(
                PaymentMethod::transfer(),
                $this->faker()->dateTimeBetween('now', '+30 days')
            ),
            Type::vat(),
            $seriesId,
            new \DateTime(),
            null,
            null,
            $currency
        );

        $invoice->addInvoiceContent(
            InvoicesContent::fromName(
                $this->faker()->colorName,
                'szt.',
                mt_rand(1, 5),
                $this->faker()->randomFloat(2, 100, 1000),
                23
            )
        );

        $invoice->addInvoiceContent(
            InvoicesContent::fromName(
                $this->faker()->colorName,
                'szt.',
                mt_rand(1, 5),
                $this->faker()->randomFloat(2, 100, 1000),
                23
            )
        );

        return $invoice;
    }

    private function newInvoiceContent(): InvoicesContent
    {
        return InvoicesContent::fromName(
            $this->faker()->colorName,
            'szt.',
            mt_rand(1, 5),
            $this->faker()->randomFloat(2, 100, 1000),
            23
        );
    }

    /**
     * @return Contractor
     */
    private function newContractor(): Contractor
    {
        return new Contractor(
            $this->faker()->company,
            null,
            '1234563218',
            null,
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
            )
        );
    }
}