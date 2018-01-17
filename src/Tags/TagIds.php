<?php

namespace Webit\WFirmaSDK\Tags;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("tags")
 */
final class TagIds implements \IteratorAggregate, \Countable
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\XmlValue
     * @JMS\XmlElement(cdata=false)
     */
    private $ids;

    /**
     * @param TagId[] $ids
     */
    public function __construct(array $ids = array())
    {
        $this->setIds($ids);
    }

    /**
     * @return TagId[]
     */
    public function ids()
    {
        $arIds = $this->ids ? explode(',', $this->ids) : array();

        array_walk($arIds, function (&$item) {
            $item = new TagId(trim($item, '()'));
        });

        return $arIds;
    }

    /**
     * @param TagId $tagId
     * @return TagIds
     */
    public function withTagId(TagId $tagId)
    {
        $ids = $this->ids();
        $ids[] = $tagId;
        $ids = array_unique($ids);

        return new self($ids);
    }

    /**
     * @param TagId $tagId
     * @return $this|TagIds
     */
    public function withoutTagId(TagId $tagId)
    {
        $ids = $this->ids();
        $key = array_search($tagId, $ids);
        if ($key === false) {
            return $this;
        }

        unset($ids[$key]);

        return new self(array_values($ids));
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->ids());
    }

    private function setIds(array $ids)
    {
        if (!$ids) {
            $this->ids = null;
            return;
        }

        $arTags = array();
        /** @var TagId $tagId */
        foreach ($ids as $tagId) {
            if (!($tagId instanceof TagId)) {
                throw new \InvalidArgumentException('Id must be an instance of TagId.');
            }

            $arTags[] = sprintf('(%s)', $tagId);
        }

        $this->ids = implode(',', array_unique($arTags));
    }

    /**
     * @inheritdoc
     */
    public function count()
    {
        $ids = $this->ids();

        return count($ids);
    }
}
