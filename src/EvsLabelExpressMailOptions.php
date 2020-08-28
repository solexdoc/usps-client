<?php


namespace USPS;


use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class EvsLabelExpressMailOptions
 * @package USPS
 * @Serializer\AccessorOrder("custom", custom = {"DeliveryOption", "WaiverOfSignature","eSOFAllowed"})
 */
class EvsLabelExpressMailOptions
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $DeliveryOption = '1';
    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $WaiverOfSignature = true;
    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $eSOFAllowed = true;

    /**
     * @return string
     */
    public function getDeliveryOption(): string
    {
        return $this->DeliveryOption;
    }

    /**
     * @param string $DeliveryOption
     * @return EvsLabelExpressMailOptions
     */
    public function setDeliveryOption(string $DeliveryOption): EvsLabelExpressMailOptions
    {
        $this->DeliveryOption = $DeliveryOption;
        return $this;
    }

    /**
     * @return bool
     */
    public function isWaiverOfSignature(): bool
    {
        return $this->WaiverOfSignature;
    }

    /**
     * @param bool $WaiverOfSignature
     * @return EvsLabelExpressMailOptions
     */
    public function setWaiverOfSignature(bool $WaiverOfSignature): EvsLabelExpressMailOptions
    {
        $this->WaiverOfSignature = $WaiverOfSignature;
        return $this;
    }

    /**
     * @return bool
     */
    public function isESOFAllowed(): bool
    {
        return $this->eSOFAllowed;
    }

    /**
     * @param bool $eSOFAllowed
     * @return EvsLabelExpressMailOptions
     */
    public function setESOFAllowed(bool $eSOFAllowed): EvsLabelExpressMailOptions
    {
        $this->eSOFAllowed = $eSOFAllowed;
        return $this;
    }


}
