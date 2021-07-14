<?php

declare(strict_types=1);

namespace Webit\WFirmaSDK\Entity\Parameters;

use JMS\Serializer\Annotation as JMS;

class NotGroup implements \Webit\WFirmaSDK\Entity\Condition
{

    /**
     * @var Condition[]
     * @JMS\Type("array<Webit\WFirmaSDK\Entity\Parameters\Condition>")
     * @JMS\XmlList(inline = true, entry="condition")
     * @JMS\Groups({"findRequest"})
     */
    private $conditions;

    public function __construct(Condition ...$conditions)
    {
        $this->conditions = $conditions;
    }
}
