<?php


namespace USPS;


use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class EvsLabelImageParametersLabelSequence
 * @package USPS
 * @Serializer\AccessorOrder("custom", custom = {"PackageNumber", "TotalPackages"})
 */
class EvsLabelImageParametersLabelSequence
{
    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     *
     */
    private int $PackageNumber;
    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     */
    private int $TotalPackages;

    /**
     * @return int
     */
    public function getPackageNumber(): int
    {
        return $this->PackageNumber;
    }

    /**
     * @param int $PackageNumber
     * @return EvsLabelImageParametersLabelSequence
     */
    public function setPackageNumber(int $PackageNumber): EvsLabelImageParametersLabelSequence
    {
        $this->PackageNumber = $PackageNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalPackages(): int
    {
        return $this->TotalPackages;
    }

    /**
     * @param int $TotalPackages
     * @return EvsLabelImageParametersLabelSequence
     */
    public function setTotalPackages(int $TotalPackages): EvsLabelImageParametersLabelSequence
    {
        $this->TotalPackages = $TotalPackages;
        return $this;
    }


}
