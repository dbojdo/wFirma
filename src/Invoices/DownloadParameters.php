<?php

namespace Webit\WFirmaSDK\Invoices;

use Webit\WFirmaSDK\Entity\Parameters\Parameter;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;

final class DownloadParameters
{
    /** @var InvoicePage */
    private $page;

    /** @var bool */
    private $printAddress;

    /** @var bool */
    private $paymentLeaflet;

    /** @var bool */
    private $duplicate;

    /**
     * @param InvoicePage $page
     * @param bool $printAddress
     * @param bool $paymentLeaflet
     * @param bool $duplicate
     */
    public function __construct(
        InvoicePage $page = null,
        $printAddress = false,
        $paymentLeaflet = false,
        $duplicate = false
    ) {
        $this->page = $page ?: InvoicePage::invoice();
        $this->printAddress = (bool)$printAddress;
        $this->paymentLeaflet = (bool)$paymentLeaflet;
        $this->duplicate = (bool)$duplicate;
    }

    /**
     * @return Parameters
     */
    public function toActionParameters()
    {
        return Parameters::actionParameters(array(
            new Parameter('page', (string)$this->page),
            new Parameter('address', (int)$this->printAddress),
            new Parameter('leaflet', (int)$this->paymentLeaflet),
            new Parameter('duplicate', (int)$this->duplicate)
        ));
    }
}
