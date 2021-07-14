<?php

declare(strict_types=1);

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\Annotation as JMS;
use Webit\WFirmaSDK\Entity\Condition;

final class Conditions implements \Webit\WFirmaSDK\Entity\Condition
{

    /**
     * @var AndGroup[]
     * @JMS\Type("array<Webit\WFirmaSDK\Entity\Parameters\AndGroup>")
     * @JMS\XmlList(inline = true, entry="and")
     * @JMS\Groups({"findRequest"})
     */
    private $and;

    /**
     * @var OrGroup[]
     * @JMS\SerializedName("or")
     * @JMS\Type("array<Webit\WFirmaSDK\Entity\Parameters\OrGroup>")
     * @JMS\XmlList(inline = true, entry="or")
     * @JMS\Groups({"findRequest"})
     */
    private $or;

    /**
     * @var NotGroup[]
     * @JMS\SerializedName("not")
     * @JMS\Type("array<Webit\WFirmaSDK\Entity\Parameters\NotGroup>")
     * @JMS\XmlList(inline = true, entry="not")
     * @JMS\Groups({"findRequest"})
     */
    private $not;

    private function __construct(?AndGroup $andGroup = null, ?OrGroup $orGroup = null, ?NotGroup $notGroup = null)
    {
        $this->and = [$andGroup];
        $this->or = [$orGroup];
        $this->not = [$notGroup];
    }

    public static function fromAndConditions(Condition ...$conditions)
    {
        $and = new AndGroup(...$conditions);
        return new self($and);
    }

    public static function fromOrConditions(Condition ...$conditions)
    {
        $or = new OrGroup(...$conditions);
        return new self(null, $or);
    }

    public static function fromNotConditions(NotGroup ...$conditions)
    {
        $not = new NotGroup(...$conditions);
        return new self(null, null, $not);
    }

    public function addAndConditions(Condition ...$conditions)
    {
        $and = new AndGroup(...$conditions);
        $this->and[] = $and;
    }

    public function addOrConditions(Condition ...$conditions)
    {
        $or = new OrGroup(...$conditions);
        $this->or[] = $or;
    }

    public function addNotConditions(Condition ...$conditions)
    {
        $not = new NotGroup(...$conditions);
        $this->not[] = $not;
    }

    public function addAndGroup(AndGroup $group)
    {
        $this->and[] = $group;
    }

    public function addOrGroup(OrGroup $group)
    {
        $this->or[] = $group;
    }

    public function addNotGroup(NotGroup $group)
    {
        $this->not[] = $group;
    }
}
