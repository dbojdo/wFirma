<?php

namespace Webit\WFirmaSDK\Vat;

use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\DateAwareEntity;

/**
 * @JMS\XmlRoot("vat_moss_details")
 */
final class VatMossDetails extends DateAwareEntity
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("object_name")
     * @JMS\Groups({"response"})
     */
    private $objectName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("object_id")
     * @JMS\Groups({"response"})
     */
    private $objectId;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     * @JMS\Groups({"request", "response"})
     */
    private $serviceCode;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("evidence1_type")
     * @JMS\Groups({"request", "response"})
     */
    private $evidence1Type;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("evidence1_description")
     * @JMS\Groups({"request", "response"})
     */
    private $evidence1Description;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("evidence2_type")
     * @JMS\Groups({"request", "response"})
     */
    private $evidence2Type;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("evidence2_description")
     * @JMS\Groups({"request", "response"})
     */
    private $evidence2Description;

    /**
     * @param string $objectId
     * @param ServiceCode $code
     * @param Evidence|null $evidence1
     * @param Evidence|null $evidence2
     */
    public function __construct(
        $objectId,
        ServiceCode $code,
        Evidence $evidence1 = null,
        Evidence $evidence2 = null
    ) {
        $this->objectName = 'Invoice';
        $this->objectId = $objectId;
        $this->serviceCode = (string)$code;
        $this->changeEvidence1($evidence1);
        $this->changeEvidence2($evidence2);
    }

    /**
     * @return null|\Webit\WFirmaSDK\Entity\EntityId|VatMossDetailsId
     */
    public function id()
    {
        return VatMossDetailsId::create($this->plainId());
    }

    /**
     * @return string
     */
    public function objectName()
    {
        return $this->objectName;
    }

    /**
     * @return string
     */
    public function objectId()
    {
        return $this->objectId;
    }

    /**
     * @return ServiceCode
     */
    public function serviceCode()
    {
        return $this->serviceCode ? ServiceCode::fromString($this->serviceCode) : null;
    }

    /**
     * @param ServiceCode $serviceCode
     */
    public function changeType(ServiceCode $serviceCode)
    {
        $this->serviceCode = (string)$serviceCode;
    }

    /**
     * @return string
     */
    public function evidence1()
    {
        return $this->evidence1Type || $this->evidence1Description ? new Evidence($this->evidence1Type, $this->evidence1Description) : null;
    }

    /**
     * @param Evidence|null $evidence
     */
    public function changeEvidence1(Evidence $evidence = null)
    {
        $this->evidence1Type = $evidence ? $evidence->type() : null;
        $this->evidence1Description = $evidence ? $evidence->description() : null;
    }

    /**
     * @return string
     */
    public function evidence2()
    {
        return $this->evidence2Type || $this->evidence2Description ? new Evidence($this->evidence2Type, $this->evidence2Description) : null;
    }

    /**
     * @param Evidence|null $evidence
     */
    public function changeEvidence2(Evidence $evidence = null)
    {
        $this->evidence2Type = $evidence ? $evidence->type() : null;
        $this->evidence2Description = $evidence ? $evidence->description() : null;
    }
}
