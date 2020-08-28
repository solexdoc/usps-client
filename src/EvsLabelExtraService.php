<?php


namespace USPS;


use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class EvsLabelExtraService
 * @package USPS
 * @Serializer\AccessorOrder("custom", custom = {"ExtraService"})
 */
class EvsLabelExtraService
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $ExtraService;

    /**
     * @return string
     */
    public function getExtraService(): string
    {
        return $this->ExtraService;
    }

    /**
     * @param string $ExtraService
     * @return EvsLabelExtraService
     */
    public function setExtraService(string $ExtraService): EvsLabelExtraService
    {
        $this->ExtraService = $ExtraService;
        return $this;
    }


}
