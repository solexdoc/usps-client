<?php


namespace USPS;


use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class EvsLabelImageParameters
 * @package USPS
 * @Serializer\AccessorOrder("custom", custom = {"ImageParameter", "XCoordinate","YCoordinate","LabelSequence"})
 */
class EvsLabelImageParameters
{
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $ImageParameter;

    /**
     * @var int|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?int $XCoordinate = null;
    /**
     * @var int|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?int $YCoordinate = null;


    private EvsLabelImageParametersLabelSequence $LabelSequence;

    public function __construct()
    {
        $this->LabelSequence = new EvsLabelImageParametersLabelSequence();
    }

    /**
     * @return string|null
     */
    public function getImageParameter(): ?string
    {
        return $this->ImageParameter;
    }

    /**
     * @param string|null $ImageParameter
     * @return EvsLabelImageParameters
     */
    public function setImageParameter(?string $ImageParameter): EvsLabelImageParameters
    {
        $this->ImageParameter = $ImageParameter;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getXCoordinate(): ?int
    {
        return $this->XCoordinate;
    }

    /**
     * @param int|null $Xcoordinate
     * @return EvsLabelImageParameters
     */
    public function setXCoordinate(?int $XCoordinate): EvsLabelImageParameters
    {
        $this->XCoordinate = $XCoordinate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getYCoordinate(): ?int
    {
        return $this->YCoordinate;
    }

    /**
     * @param int|null $Ycoordinate
     * @return EvsLabelImageParameters
     */
    public function setYCoordinate(?int $YCoordinate): EvsLabelImageParameters
    {
        $this->YCoordinate = $YCoordinate;
        return $this;
    }

    /**
     * @return EvsLabelImageParametersLabelSequence
     */
    public function getLabelSequence(): EvsLabelImageParametersLabelSequence
    {
        return $this->LabelSequence;
    }

    /**
     * @param EvsLabelImageParametersLabelSequence $LabelSequence
     * @return EvsLabelImageParameters
     */
    public function setLabelSequence(EvsLabelImageParametersLabelSequence $LabelSequence): EvsLabelImageParameters
    {
        $this->LabelSequence = $LabelSequence;
        return $this;
    }



}
