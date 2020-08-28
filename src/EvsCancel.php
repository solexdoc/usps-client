<?php


namespace USPS;


use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Visitor\Factory\XmlDeserializationVisitorFactory;
use JMS\Serializer\Visitor\Factory\XmlSerializationVisitorFactory;
use JMS\Serializer\XmlSerializationVisitor;

/**
 * Class EvsLabel
 * @package USPS
 * @Serializer\ExclusionPolicy("none")
 * @Serializer\XmlDiscriminator(cdata=false)
 * @Serializer\AccessorOrder("custom", custom = {"BarcodeNumber"})
 */
class EvsCancel extends USPSBase
{
    public function __construct($username = '')
    {
        parent::__construct($username);

        $this->setUSERID($username);
        $this->BarcodeNumber = "";
    }

    /**
     * @var string - the api version used for this type of call
     * @Serializer\Exclude()
     */
    protected $apiVersion = 'eVSCancel';


    /**
     * @var array - route added so far.
     * @Serializer\Exclude()
     */
    protected $fields = [];

    /**
     * @var string
     * @Serializer\XmlAttribute()
     *
     */
    private string $USERID = "";

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $BarcodeNumber = "";

    public function cancelLabel() : ?EvsCancelResponse
    {
        $response = $this->doRequest();
        if ($this->isSuccess()){
            return $this->deserializeResponseString($response);
        }
        return null;
    }
    public function getError() : ?ErrorResponse
    {
        if ($this->isError()){
            return new ErrorResponse(intval($this->errorCode),$this->errorMessage);
        }
        return null;
    }


    public function deserializeResponseString(string $responseString) : EvsCancelResponse
    {
        $xmlDeserializationFactory = new XmlDeserializationVisitorFactory();
        $serializerBuilder = SerializerBuilder::create()
            ->setPropertyNamingStrategy(
                new \JMS\Serializer\Naming\SerializedNameAnnotationStrategy(
                    new \JMS\Serializer\Naming\IdenticalPropertyNamingStrategy()
                )
            );
        $serializerBuilder->addDefaultDeserializationVisitors();
        $serializerBuilder->setDeserializationVisitor('xml', $xmlDeserializationFactory);
        $serializer = $serializerBuilder->build();

        //$serializer = SerializerBuilder::create()->build();
        return $serializer->deserialize($responseString, 'USPS\EvsCancelResponse', 'xml');

    }

    public function getXMLString()
    {
        $xmlSerializationFactory = new XmlSerializationVisitorFactory();
        $serializerBuilder = SerializerBuilder::create()
            ->setPropertyNamingStrategy(
                new \JMS\Serializer\Naming\SerializedNameAnnotationStrategy(
                    new \JMS\Serializer\Naming\IdenticalPropertyNamingStrategy()
                )
            );
        $serializerBuilder->addDefaultSerializationVisitors();
        $xmlSerializationFactory->setFormatOutput(true);
        $xmlSerializationFactory->setDefaultRootName("eVSCancelRequest");
        $serializerBuilder->setSerializationVisitor('xml', $xmlSerializationFactory);
        $serializer = $serializerBuilder->build();
        $xml = $serializer->serialize($this, 'xml');
        return trim(preg_replace("/<\?xml.+?\?>/", "", $xml));
    }


    /**
     * returns array of all fields added.
     *
     * @return array
     */
    public function getPostFields()
    {
        return $this->fields;
    }


    /**
     * @return string
     */
    public function getUSERID(): string
    {
        return $this->USERID;
    }

    public function setUSERID(string $USERID): EvsCancel
    {
        $this->USERID = $USERID;
        return $this;
    }

    /**
     * @return string
     */
    public function getBarcodeNumber(): string
    {
        return $this->BarcodeNumber;
    }

    /**
     * @param string $BarcodeNumber
     * @return EvsCancel
     */
    public function setBarcodeNumber(string $BarcodeNumber): EvsCancel
    {
        $this->BarcodeNumber = $BarcodeNumber;
        return $this;
    }

}
