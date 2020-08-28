<?php


namespace USPS;


use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Visitor\Factory\XmlSerializationVisitorFactory;
use JMS\Serializer\XmlSerializationVisitor;

/**
 * Class EvsCancelResponse
 * @package USPS
 * @Serializer\ExclusionPolicy("none")
 */
class EvsCancelResponse
{
    public function __construct()
    {

    }


    private string $BarcodeNumber = '';

    private string $Status = '';

    private string $Reason ='';

    /**
     * @return string
     */
    public function getBarcodeNumber(): string
    {
        return $this->BarcodeNumber;
    }

    /**
     * @param string $BarcodeNumber
     * @return EvsCancelResponse
     */
    public function setBarcodeNumber(string $BarcodeNumber): EvsCancelResponse
    {
        $this->BarcodeNumber = $BarcodeNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->Status;
    }

    /**
     * @param string $Status
     * @return EvsCancelResponse
     */
    public function setStatus(string $Status): EvsCancelResponse
    {
        $this->Status = $Status;
        return $this;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->Reason;
    }

    /**
     * @param string $Reason
     * @return EvsCancelResponse
     */
    public function setReason(string $Reason): EvsCancelResponse
    {
        $this->Reason = $Reason;
        return $this;
    }




}
