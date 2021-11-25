<?php


namespace USPS;


use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Visitor\Factory\XmlSerializationVisitorFactory;
use JMS\Serializer\XmlSerializationVisitor;

/**
 * Class EvsLabel
 * @package USPS
 * @Serializer\ExclusionPolicy("none")
 * @Serializer\XmlDiscriminator(cdata=false)
 * @Serializer\AccessorOrder("custom", custom = {"Option", "Revision","ImageParameters","FromName","FromFirm","FromAddress1","FromAddress2","FromCity","FromState","FromZip5",
 *     "FromZip4","FromPhone","POZipCode","AllowNonCleansedOriginAddr","ToName","ToFirm","ToAddress1","ToAddress2","ToCity","ToState","ToZip5","ToZip4",
 *     "ToPhone","POBox","ToContactPreference","ToContactMessaging","ToContactEmail","AllowNonCleansedDestAddr","WeightInOunces","ServiceType",
 *     "Container","Width","Length","Height","Machinable","ProcessingCategory","PriceOptions","InsuredAmount","AddressServiceRequested","ExpressMailOptions",
 *     "ShipDate","CustomerRefNo","CustomerRefNo2","ExtraServices","HoldForPickup","OpenDistribute","PermitNumber","PermitZIPCode","PermitHolderName",
 *     "CRID","MID","VendorCode","VendorProductVersionNumber","SenderName","SenderEMail","RecipientName","RecipientEMail","ReceiptOption",
 *     "ImageType","HoldForManifest","NineDigitRoutingZip","ShipInfo","CarrierRelease","DropOffTime","ReturnCommitments","PrintCustomerRefNo",
 *     "PrintCustomerRefNo2","ActionCode","OptOutOfSPE","SortationLevel","DestinationEntryFacilityType"
 *     })
 */
class EvsLabel extends USPSBase
{
    public function __construct($username = '')
    {
        parent::__construct($username);

        $this->setUSERID($username);
        $this->ImageParameters = new EvsLabelImageParameters();
        $this->ExtraServices = [];
    }

    /**
     * @var string - the api version used for this type of call
     * @Serializer\Exclude()
     */
    protected $apiVersion = 'eVS';


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
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $Option = "";
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $Revision = "";

    private EvsLabelImageParameters $ImageParameters;

    //max length 100
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $FromName;
    //max length 50
    /** @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $FromFirm;

    //used for the suite or apt #, min 0 max length 50
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $FromAddress1 = null;
    //max length 50
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $FromAddress2;
    //max length 28
    /** @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $FromCity;
    //max length 2
    /** @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $FromState;

    //max length 5
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $FromZip5;
    //max length 4
    /** @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $FromZip4 = null;

    //when passed, it must be 10 digits
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $FromPhone = null;

    //max length 5
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $POZipCode = null;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $AllowNonCleansedOriginAddr = false;

    //max length 100
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $ToName;
    //max length 50
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $ToFirm;
    //max length 50, used for suite/apt.
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $ToAddress1 = null;

    //max string 50
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $ToAddress2;

    //max string 28
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $ToCity;

    //max lenght 2
    /** @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $ToState;

    //max length 5
    /** @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $ToZip5;
    //max length 4
    /** @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $ToZip4 = null;

    //when passed, it must be 10 digits
    /** @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $ToPhone = null;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $POBox = false;

    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $ToContactPreference = null;
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $ToContactMessaging = null;
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $ToContactEmail = null;
    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $AllowNonCleansedDestAddr = false;
    //70 pounds (1120 ounces) or less
    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     */
    private int $WeightInOunces;
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $ServiceType;
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     *
     */
    private string $Container = "VARIABLE";
    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     */
    private float $Width;
    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     */
    private float $Length;
    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     */
    private float $Height;
    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $Machinable = true;
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $ProcessingCategory = null;
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $PriceOptions = null;
    /**
     * @var float|int
     * @Serializer\XmlElement(cdata=false)
     */
    private float $InsuredAmount = 0;
    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $AddressServiceRequested = false;
    /**
     * @var EvsLabelExpressMailOptions|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?EvsLabelExpressMailOptions $ExpressMailOptions = null;

    //mois jour année
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $ShipDate = null;
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $CustomerRefNo = null;
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $CustomerRefNo2 = null;
    /**
     * @var array|null
     * @Serializer\Type("array")
     * @Serializer\XmlList(inline = true, entry = "ExtraServices")
     */
    private ?array $ExtraServices = null;

    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $CRID = null;

    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $MID = null;

    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $VendorCode = null;
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $VendorProductVersionNumber = null;
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $SenderName = null;
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $SenderEMail = null;
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $RecipientName = null;
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $RecipientEMail = null;
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $ReceiptOption = "None";
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private string $ImageType = 'PDF';
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $HoldForManifest = null;
    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $NineDigitRoutingZip = false;
    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $ShipInfo = false;
    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $CarrierRelease = false;
    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $DropOffTime = null;
    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $ReturnCommitments = false;
    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $PrintCustomerRefNo = false;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $PrintCustomerRefNo2 = false;

    /**
     * @var EvsLabelContent|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?EvsLabelContent $Content = null;

    /**
     * @var string|null
     * @Serializer\XmlElement(cdata=false)
     */
    private ?string $ActionCode = null;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     */
    private bool $OptOutOfSPE = true;

    /**
     * Perform the API call.
     *
     * @return string
     */
    public function createLabel()
    {
        return $this->doRequest();
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
        $xmlSerializationFactory->setDefaultRootName("eVSRequest");
        $serializerBuilder->setSerializationVisitor('xml', $xmlSerializationFactory);
        $serializer = $serializerBuilder->build();
        $xml = $serializer->serialize($this, 'xml');
        return trim(preg_replace("/<\?xml.+?\?>/", "", $xml));


        //return '<eVSRequest USERID="189SOLEX6825"><Option></Option><Revision></Revision><ImageParameters><ImageParameter>4x6LABELP</ImageParameter><XCoordinate>0</XCoordinate><YCoordinate>900</YCoordinate></ImageParameters><FromName>US POSTAL HEADQUARTERS</FromName><FromFirm></FromFirm><FromAddress1>RM 1P010</FromAddress1><FromAddress2>475 LENFANT PLZ SW</FromAddress2><FromCity>Washington</FromCity><FromState>DC</FromState><FromZip5>20260</FromZip5><FromZip4></FromZip4><FromPhone></FromPhone><AllowNonCleansedOriginAddr>FALSE</AllowNonCleansedOriginAddr><ToName>Customer</ToName><ToFirm></ToFirm><ToAddress1></ToAddress1><ToAddress2>325 N Maple Dr</ToAddress2><ToCity>Beverly Hills</ToCity><ToState>CA</ToState><ToZip5>90210</ToZip5><ToZip4></ToZip4><ToPhone></ToPhone><AllowNonCleansedDestAddr>False</AllowNonCleansedDestAddr><WeightInOunces>18.0000</WeightInOunces><ServiceType>PRIORITY</ServiceType><Container>RECTANGULAR</Container><Width>3</Width><Length>6</Length><Height>6</Height><Machinable></Machinable><CustomerRefNo>PM</CustomerRefNo><ExtraServices><ExtraService>155</ExtraService></ExtraServices><ReceiptOption>None</ReceiptOption><ImageType>PDF</ImageType><PrintCustomerRefNo>True</PrintCustomerRefNo></eVSRequest>';
    }

    /**
     * Return the USPS confirmation/tracking number if we have one.
     *
     * @return string|bool
     */
    public function getConfirmationNumber()
    {
        $response = $this->getArrayResponse();
        // Check to make sure we have it
        if (isset($response[$this->getResponseApiName()])) {
            if (isset($response[$this->getResponseApiName()]['EMConfirmationNumber'])) {
                return $response[$this->getResponseApiName()]['EMConfirmationNumber'];
            }
        }

        return false;
    }

    /**
     * Return the USPS label as a base64 encoded string.
     *
     * @return string|bool
     */
    public function getLabelContents()
    {
        $response = $this->getArrayResponse();
        // Check to make sure we have it
        if (isset($response[$this->getResponseApiName()])) {
            if (isset($response[$this->getResponseApiName()]['LabelImage'])) {
                return $response[$this->getResponseApiName()]['LabelImage'];
            }
        }
        return false;
    }

    /**
     * Return the USPS receipt as a base64 encoded string.
     *
     * @return string|bool
     */
    public function getReceiptContents()
    {
        $response = $this->getArrayResponse();
        // Check to make sure we have it
        if (isset($response[$this->getResponseApiName()])) {
            if (isset($response[$this->getResponseApiName()]['EMReceipt'])) {
                return $response[$this->getResponseApiName()]['EMReceipt'];
            }
        }

        return false;
    }

    public function getBarcodeNumber() : ?string
    {
        if ($this->isSuccess()){
            $response = $this->getArrayResponse();
            // Check to make sure we have it
            if (isset($response[$this->getResponseApiName()])) {
                if (isset($response[$this->getResponseApiName()]['BarcodeNumber'])) {
                    return $response[$this->getResponseApiName()]['BarcodeNumber'];
                }
            }
        }
        return null;
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

    public function setFromAddress(
        string $firstName,
        string $lastName,
        string $company,
        string $address,
        string $suite,
        string $city,
        string $state,
        string $zip,
        string $zip4,
        ?string $phone
    ): EvsLabel
    {
        $this->setFromName($firstName . " " . $lastName);
        $this->setFromFirm($company);
        $this->setFromAddress1($suite);
        $this->setFromAddress2($address);
        $this->setFromCity($city);
        $this->setFromState($state);
        $this->setFromZip5($zip);
        $this->setFromZip4($zip4);
        $this->setFromPhone($phone);
        return $this;
    }

    public function setToAddress(
        string $firstName,
        string $lastName,
        string $company,
        string $address,
        string $suite,
        string $city,
        string $state,
        string $zip,
        string $zip4,
        ?string $phone
    ): EvsLabel
    {
        $this->setToName($firstName . " " . $lastName);
        $this->setToFirm($company);
        $this->setToAddress1($suite);
        $this->setToAddress2($address);
        $this->setToCity($city);
        $this->setToState($state);
        $this->setToZip5($zip);
        $this->setToZip4($zip4);
        $this->setToPhone($phone);
        return $this;
    }

    /**
     * @return string
     */
    public function getUSERID(): string
    {
        return $this->USERID;
    }

    /**
     * @param string $USERID
     * @return EvsLabel
     */
    public function setUSERID(string $USERID): EvsLabel
    {
        $this->USERID = $USERID;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOption(): ?string
    {
        return $this->Option;
    }

    /**
     * @param string|null $Option
     * @return EvsLabel
     */
    public function setOption(?string $Option): EvsLabel
    {
        $this->Option = $Option;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRevision(): ?string
    {
        return $this->Revision;
    }

    /**
     * @param string|null $Revision
     * @return EvsLabel
     */
    public function setRevision(?string $Revision): EvsLabel
    {
        $this->Revision = $Revision;
        return $this;
    }

    /**
     * @return EvsLabelImageParameters
     */
    public function getImageParameters(): EvsLabelImageParameters
    {
        return $this->ImageParameters;
    }

    /**
     * @param EvsLabelImageParameters $ImageParameters
     * @return EvsLabel
     */
    public function setImageParameters(EvsLabelImageParameters $ImageParameters): EvsLabel
    {
        $this->ImageParameters = $ImageParameters;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromName(): string
    {
        return $this->FromName;
    }

    /**
     * @param string $FromName
     * @return EvsLabel
     */
    public function setFromName(string $FromName): EvsLabel
    {
        $this->FromName = $FromName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromFirm(): string
    {
        return $this->FromFirm;
    }

    /**
     * @param string $FromFirm
     * @return EvsLabel
     */
    public function setFromFirm(string $FromFirm): EvsLabel
    {
        $this->FromFirm = $FromFirm;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFromAddress1(): ?string
    {
        return $this->FromAddress1;
    }

    /**
     * @param string|null $FromAddress1
     * @return EvsLabel
     */
    public function setFromAddress1(?string $FromAddress1): EvsLabel
    {
        $this->FromAddress1 = $FromAddress1;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromAddress2(): string
    {
        return $this->FromAddress2;
    }

    /**
     * @param string $FromAddress2
     * @return EvsLabel
     */
    public function setFromAddress2(string $FromAddress2): EvsLabel
    {
        $this->FromAddress2 = $FromAddress2;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromCity(): string
    {
        return $this->FromCity;
    }

    /**
     * @param string $FromCity
     * @return EvsLabel
     */
    public function setFromCity(string $FromCity): EvsLabel
    {
        $this->FromCity = $FromCity;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromState(): string
    {
        return $this->FromState;
    }

    /**
     * @param string $FromState
     * @return EvsLabel
     */
    public function setFromState(string $FromState): EvsLabel
    {
        $this->FromState = $FromState;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromZip5(): string
    {
        return $this->FromZip5;
    }

    /**
     * @param string $FromZip5
     * @return EvsLabel
     */
    public function setFromZip5(string $FromZip5): EvsLabel
    {
        $this->FromZip5 = $FromZip5;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFromZip4(): string
    {
        return $this->FromZip4;
    }

    /**
     * @param string|null $FromZip4
     * @return EvsLabel
     */
    public function setFromZip4(string $FromZip4): EvsLabel
    {
        $this->FromZip4 = $FromZip4;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFromPhone(): ?string
    {
        return $this->FromPhone;
    }

    /**
     * @param string|null $FromPhone
     * @return EvsLabel
     */
    public function setFromPhone(?string $FromPhone): EvsLabel
    {
        $this->FromPhone = $FromPhone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPOZipCode(): ?string
    {
        return $this->POZipCode;
    }

    /**
     * @param string|null $POZipCode
     * @return EvsLabel
     */
    public function setPOZipCode(?string $POZipCode): EvsLabel
    {
        $this->POZipCode = $POZipCode;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAllowNonCleansedOriginAddr(): bool
    {
        return $this->AllowNonCleansedOriginAddr;
    }

    /**
     * @param bool $AllowNonCleansedOriginAddr
     * @return EvsLabel
     */
    public function setAllowNonCleansedOriginAddr(bool $AllowNonCleansedOriginAddr): EvsLabel
    {
        $this->AllowNonCleansedOriginAddr = $AllowNonCleansedOriginAddr;
        return $this;
    }

    /**
     * @return string
     */
    public function getToName(): string
    {
        return $this->ToName;
    }

    /**
     * @param string $ToName
     * @return EvsLabel
     */
    public function setToName(string $ToName): EvsLabel
    {
        $this->ToName = $ToName;
        return $this;
    }

    /**
     * @return string
     */
    public function getToFirm(): string
    {
        return $this->ToFirm;
    }

    /**
     * @param string $ToFirm
     * @return EvsLabel
     */
    public function setToFirm(string $ToFirm): EvsLabel
    {
        $this->ToFirm = $ToFirm;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getToAddress1(): ?string
    {
        return $this->ToAddress1;
    }

    /**
     * @param string|null $ToAddress1
     * @return EvsLabel
     */
    public function setToAddress1(?string $ToAddress1): EvsLabel
    {
        $this->ToAddress1 = $ToAddress1;
        return $this;
    }

    /**
     * @return string
     */
    public function getToAddress2(): string
    {
        return $this->ToAddress2;
    }

    /**
     * @param string $ToAddress2
     * @return EvsLabel
     */
    public function setToAddress2(string $ToAddress2): EvsLabel
    {
        $this->ToAddress2 = $ToAddress2;
        return $this;
    }

    /**
     * @return string
     */
    public function getToCity(): string
    {
        return $this->ToCity;
    }

    /**
     * @param string $ToCity
     * @return EvsLabel
     */
    public function setToCity(string $ToCity): EvsLabel
    {
        $this->ToCity = $ToCity;
        return $this;
    }

    /**
     * @return string
     */
    public function getToState(): string
    {
        return $this->ToState;
    }

    /**
     * @param string $ToState
     * @return EvsLabel
     */
    public function setToState(string $ToState): EvsLabel
    {
        $this->ToState = $ToState;
        return $this;
    }

    /**
     * @return string
     */
    public function getToZip5(): string
    {
        return $this->ToZip5;
    }

    /**
     * @param string $ToZip5
     * @return EvsLabel
     */
    public function setToZip5(string $ToZip5): EvsLabel
    {
        $this->ToZip5 = $ToZip5;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getToZip4(): ?string
    {
        return $this->ToZip4;
    }

    /**
     * @param string|null $ToZip4
     * @return EvsLabel
     */
    public function setToZip4(?string $ToZip4): EvsLabel
    {
        $this->ToZip4 = $ToZip4;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getToPhone(): ?string
    {
        return $this->ToPhone;
    }

    /**
     * @param string|null $ToPhone
     * @return EvsLabel
     */
    public function setToPhone(?string $ToPhone): EvsLabel
    {
        $this->ToPhone = $ToPhone;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPOBox(): bool
    {
        return $this->POBox;
    }

    /**
     * @param bool $POBox
     * @return EvsLabel
     */
    public function setPOBox(bool $POBox): EvsLabel
    {
        $this->POBox = $POBox;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getToContactPreference(): ?string
    {
        return $this->ToContactPreference;
    }

    /**
     * @param string|null $ToContactPreference
     * @return EvsLabel
     */
    public function setToContactPreference(?string $ToContactPreference): EvsLabel
    {
        $this->ToContactPreference = $ToContactPreference;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getToContactMessaging(): ?string
    {
        return $this->ToContactMessaging;
    }

    /**
     * @param string|null $ToContactMessaging
     * @return EvsLabel
     */
    public function setToContactMessaging(?string $ToContactMessaging): EvsLabel
    {
        $this->ToContactMessaging = $ToContactMessaging;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getToContactEmail(): ?string
    {
        return $this->ToContactEmail;
    }

    /**
     * @param string|null $ToContactEmail
     * @return EvsLabel
     */
    public function setToContactEmail(?string $ToContactEmail): EvsLabel
    {
        $this->ToContactEmail = $ToContactEmail;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAllowNonCleansedDestAddr(): bool
    {
        return $this->AllowNonCleansedDestAddr;
    }

    /**
     * @param bool $AllowNonCleansedDestAddr
     * @return EvsLabel
     */
    public function setAllowNonCleansedDestAddr(bool $AllowNonCleansedDestAddr): EvsLabel
    {
        $this->AllowNonCleansedDestAddr = $AllowNonCleansedDestAddr;
        return $this;
    }

    /**
     * @return int
     */
    public function getWeightInOunces(): int
    {
        return $this->WeightInOunces;
    }

    /**
     * @param int $WeightInOunces
     * @return EvsLabel
     */
    public function setWeightInOunces(int $WeightInOunces): EvsLabel
    {
        $this->WeightInOunces = $WeightInOunces;
        return $this;
    }

    /**
     * @return string
     */
    public function getServiceType(): string
    {
        return $this->ServiceType;
    }

    /**
     * @param string $ServiceType
     * @return EvsLabel
     */
    public function setServiceType(string $ServiceType): EvsLabel
    {
        $this->ServiceType = $ServiceType;
        return $this;
    }

    /**
     * @return string
     */
    public function getContainer(): string
    {
        return $this->Container;
    }

    /**
     * @param string $Container
     * @return EvsLabel
     */
    public function setContainer(string $Container): EvsLabel
    {
        $this->Container = $Container;
        return $this;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->Width;
    }

    /**
     * @param float $Width
     * @return EvsLabel
     */
    public function setWidth(float $Width): EvsLabel
    {
        $this->Width = $Width;
        return $this;
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->Length;
    }

    /**
     * @param float $Length
     * @return EvsLabel
     */
    public function setLength(float $Length): EvsLabel
    {
        $this->Length = $Length;
        return $this;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->Height;
    }

    /**
     * @param float $Height
     * @return EvsLabel
     */
    public function setHeight(float $Height): EvsLabel
    {
        $this->Height = $Height;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMachinable(): bool
    {
        return $this->Machinable;
    }

    /**
     * @param bool $Machinable
     * @return EvsLabel
     */
    public function setMachinable(bool $Machinable): EvsLabel
    {
        $this->Machinable = $Machinable;
        return $this;
    }

    /**
     * @return string
     */
    public function getProcessingCategory(): string
    {
        return $this->ProcessingCategory;
    }

    /**
     * @param string $ProcessingCategory
     * @return EvsLabel
     */
    public function setProcessingCategory(string $ProcessingCategory): EvsLabel
    {
        $this->ProcessingCategory = $ProcessingCategory;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPriceOptions(): ?string
    {
        return $this->PriceOptions;
    }

    /**
     * @param string|null $PriceOptions
     * @return EvsLabel
     */
    public function setPriceOptions(?string $PriceOptions): EvsLabel
    {
        $this->PriceOptions = $PriceOptions;
        return $this;
    }

    /**
     * @return float|int
     */
    public function getInsuredAmount()
    {
        return $this->InsuredAmount;
    }

    /**
     * @param float|int $InsuredAmount
     * @return EvsLabel
     */
    public function setInsuredAmount($InsuredAmount)
    {
        $this->InsuredAmount = $InsuredAmount;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAddressServiceRequested(): bool
    {
        return $this->AddressServiceRequested;
    }

    /**
     * @param bool $AddressServiceRequested
     * @return EvsLabel
     */
    public function setAddressServiceRequested(bool $AddressServiceRequested): EvsLabel
    {
        $this->AddressServiceRequested = $AddressServiceRequested;
        return $this;
    }

    /**
     * @return EvsLabelExpressMailOptions|null
     */
    public function getExpressMailOptions(): ?EvsLabelExpressMailOptions
    {
        return $this->ExpressMailOptions;
    }

    /**
     * @param EvsLabelExpressMailOptions|null $ExpressMailOptions
     * @return EvsLabel
     */
    public function setExpressMailOptions(?EvsLabelExpressMailOptions $ExpressMailOptions): EvsLabel
    {
        $this->ExpressMailOptions = $ExpressMailOptions;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getShipDate(): ?string
    {
        return $this->ShipDate;
    }

    /**
     * @param string|null $ShipDate
     * @return EvsLabel
     */
    public function setShipDate(?string $ShipDate): EvsLabel
    {
        $this->ShipDate = $ShipDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerRefNo(): ?string
    {
        return $this->CustomerRefNo;
    }

    /**
     * @param string|null $CustomerRefNo
     * @return EvsLabel
     */
    public function setCustomerRefNo(?string $CustomerRefNo): EvsLabel
    {
        $this->CustomerRefNo = $CustomerRefNo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerRefNo2(): ?string
    {
        return $this->CustomerRefNo2;
    }

    /**
     * @param string|null $CustomerRefNo2
     * @return EvsLabel
     */
    public function setCustomerRefNo2(?string $CustomerRefNo2): EvsLabel
    {
        $this->CustomerRefNo2 = $CustomerRefNo2;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getExtraServices(): ?array
    {
        return $this->ExtraServices;
    }

    /**
     * @param array|null $ExtraServices
     * @return EvsLabel
     */
    public function setExtraServices(?array $ExtraServices): EvsLabel
    {
        $this->ExtraServices = $ExtraServices;
        return $this;
    }

    public function addExtraService(EvsLabelExtraService $extraService)
    {
        $this->ExtraServices[] = $extraService;
    }

    /**
     * @return string|null
     */
    public function getCRID(): ?string
    {
        return $this->CRID;
    }

    /**
     * @param string|null $CRID
     * @return EvsLabel
     */
    public function setCRID(?string $CRID): EvsLabel
    {
        $this->CRID = $CRID;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMID(): ?string
    {
        return $this->MID;
    }

    /**
     * @param string|null $MID
     * @return EvsLabel
     */
    public function setMID(?string $MID): EvsLabel
    {
        $this->MID = $MID;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVendorCode(): ?string
    {
        return $this->VendorCode;
    }

    /**
     * @param string|null $VendorCode
     * @return EvsLabel
     */
    public function setVendorCode(?string $VendorCode): EvsLabel
    {
        $this->VendorCode = $VendorCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVendorProductVersionNumber(): ?string
    {
        return $this->VendorProductVersionNumber;
    }

    /**
     * @param string|null $VendorProductVersionNumber
     * @return EvsLabel
     */
    public function setVendorProductVersionNumber(?string $VendorProductVersionNumber): EvsLabel
    {
        $this->VendorProductVersionNumber = $VendorProductVersionNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSenderName(): ?string
    {
        return $this->SenderName;
    }

    /**
     * @param string|null $SenderName
     * @return EvsLabel
     */
    public function setSenderName(?string $SenderName): EvsLabel
    {
        $this->SenderName = $SenderName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSenderEMail(): ?string
    {
        return $this->SenderEMail;
    }

    /**
     * @param string|null $SenderEMail
     * @return EvsLabel
     */
    public function setSenderEMail(?string $SenderEMail): EvsLabel
    {
        $this->SenderEMail = $SenderEMail;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRecipientName(): ?string
    {
        return $this->RecipientName;
    }

    /**
     * @param string|null $RecipientName
     * @return EvsLabel
     */
    public function setRecipientName(?string $RecipientName): EvsLabel
    {
        $this->RecipientName = $RecipientName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRecipientEMail(): ?string
    {
        return $this->RecipientEMail;
    }

    /**
     * @param string|null $RecipientEMail
     * @return EvsLabel
     */
    public function setRecipientEMail(?string $RecipientEMail): EvsLabel
    {
        $this->RecipientEMail = $RecipientEMail;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReceiptOption(): ?string
    {
        return $this->ReceiptOption;
    }

    /**
     * @param string|null $ReceiptOption
     * @return EvsLabel
     */
    public function setReceiptOption(?string $ReceiptOption): EvsLabel
    {
        $this->ReceiptOption = $ReceiptOption;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageType(): string
    {
        return $this->ImageType;
    }

    /**
     * @param string $ImageType
     * @return EvsLabel
     */
    public function setImageType(string $ImageType): EvsLabel
    {
        $this->ImageType = $ImageType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHoldForManifest(): ?string
    {
        return $this->HoldForManifest;
    }

    /**
     * @param string|null $HoldForManifest
     * @return EvsLabel
     */
    public function setHoldForManifest(?string $HoldForManifest): EvsLabel
    {
        $this->HoldForManifest = $HoldForManifest;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNineDigitRoutingZip(): bool
    {
        return $this->NineDigitRoutingZip;
    }

    /**
     * @param bool $NineDigitRoutingZip
     * @return EvsLabel
     */
    public function setNineDigitRoutingZip(bool $NineDigitRoutingZip): EvsLabel
    {
        $this->NineDigitRoutingZip = $NineDigitRoutingZip;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShipInfo(): bool
    {
        return $this->ShipInfo;
    }

    /**
     * @param bool $ShipInfo
     * @return EvsLabel
     */
    public function setShipInfo(bool $ShipInfo): EvsLabel
    {
        $this->ShipInfo = $ShipInfo;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCarrierRelease(): bool
    {
        return $this->CarrierRelease;
    }

    /**
     * @param bool $CarrierRelease
     * @return EvsLabel
     */
    public function setCarrierRelease(bool $CarrierRelease): EvsLabel
    {
        $this->CarrierRelease = $CarrierRelease;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDropOffTime(): ?string
    {
        return $this->DropOffTime;
    }

    /**
     * @param string|null $DropOffTime
     * @return EvsLabel
     */
    public function setDropOffTime(?string $DropOffTime): EvsLabel
    {
        $this->DropOffTime = $DropOffTime;
        return $this;
    }

    /**
     * @return bool
     */
    public function isReturnCommitments(): bool
    {
        return $this->ReturnCommitments;
    }

    /**
     * @param bool $ReturnCommitments
     * @return EvsLabel
     */
    public function setReturnCommitments(bool $ReturnCommitments): EvsLabel
    {
        $this->ReturnCommitments = $ReturnCommitments;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPrintCustomerRefNo(): bool
    {
        return $this->PrintCustomerRefNo;
    }

    /**
     * @param bool $PrintCustomerRefNo
     * @return EvsLabel
     */
    public function setPrintCustomerRefNo(bool $PrintCustomerRefNo): EvsLabel
    {
        $this->PrintCustomerRefNo = $PrintCustomerRefNo;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPrintCustomerRefNo2(): bool
    {
        return $this->PrintCustomerRefNo2;
    }

    /**
     * @param bool $PrintCustomerRefNo2
     * @return EvsLabel
     */
    public function setPrintCustomerRefNo2(bool $PrintCustomerRefNo2): EvsLabel
    {
        $this->PrintCustomerRefNo2 = $PrintCustomerRefNo2;
        return $this;
    }

    /**
     * @return EvsLabelContent|null
     */
    public function getContent(): ?EvsLabelContent
    {
        return $this->Content;
    }

    /**
     * @param EvsLabelContent|null $Content
     * @return EvsLabel
     */
    public function setContent(?EvsLabelContent $Content): EvsLabel
    {
        $this->Content = $Content;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getActionCode(): ?string
    {
        return $this->ActionCode;
    }

    /**
     * @param string|null $ActionCode
     * @return EvsLabel
     */
    public function setActionCode(?string $ActionCode): EvsLabel
    {
        $this->ActionCode = $ActionCode;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOptOutOfSPE(): bool
    {
        return $this->OptOutOfSPE;
    }

    /**
     * @param bool $OptOutOfSPE
     * @return EvsLabel
     */
    public function setOptOutOfSPE(bool $OptOutOfSPE): EvsLabel
    {
        $this->OptOutOfSPE = $OptOutOfSPE;
        return $this;
    }


}
