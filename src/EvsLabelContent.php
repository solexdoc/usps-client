<?php


namespace USPS;


use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class EvsLabelContent
 * @package USPS
 * @Serializer\AccessorOrder("custom", custom = {"ContentType", "ContentDescription"})
 */
class EvsLabelContent
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $ContentType;
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $ContentDescription;

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->ContentType;
    }

    /**
     * @param string $ContentType
     * @return EvsLabelContent
     */
    public function setContentType(string $ContentType): EvsLabelContent
    {
        $this->ContentType = $ContentType;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentDescription(): string
    {
        return $this->ContentDescription;
    }

    /**
     * @param string $ContentDescription
     * @return EvsLabelContent
     */
    public function setContentDescription(string $ContentDescription): EvsLabelContent
    {
        $this->ContentDescription = $ContentDescription;
        return $this;
    }


}
