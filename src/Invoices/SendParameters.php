<?php

namespace Webit\WFirmaSDK\Invoices;

use Webit\WFirmaSDK\Entity\Parameters\Parameter;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;

final class SendParameters
{
    /** @var InvoicePage */
    private $page;

    /** @var bool */
    private $leaflet;

    /** @var bool */
    private $duplicate;

    /** @var string */
    private $email;

    /** @var string */
    private $subject;

    /** @var string */
    private $body;

    /**
     * @param InvoicePage $page
     * @param bool $leaflet
     * @param bool $duplicate
     * @param string $email
     * @param string $subject
     * @param string $body
     */
    public function __construct(
        InvoicePage $page = null,
        $leaflet = false,
        $duplicate = false,
        $email = null,
        $subject = null,
        $body = null
    ) {
        $this->page = $page ?: InvoicePage::invoice();
        $this->leaflet = (bool)$leaflet;
        $this->duplicate = (bool)$duplicate;
        $this->email = $email;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * @return Parameters
     */
    public function toActionParameters()
    {
        $params = array(
            new Parameter('page', (string)$this->page),
            new Parameter('leaflet', (int)$this->leaflet),
            new Parameter('duplicate', (int)$this->duplicate)
        );

        if ($this->email) {
            $params[] = new Parameter('email', $this->email);
        }

        if ($this->subject) {
            $params[] = new Parameter('subject', $this->subject);
        }

        if ($this->body) {
            $params[] = new Parameter('body', $this->body);
        }

        return Parameters::actionParameters($params);
    }
}