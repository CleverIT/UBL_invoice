<?php
/**
 * Created by PhpStorm.
 * User: bram.vaneijk
 * Date: 13-10-2016
 * Time: 17:19
 */

namespace CleverIt\UBL\Invoice;


use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Party implements XmlSerializable{
    private $name;
    /**
     * @var Address
     */
    private $postalAddress;
    /**
     * @var Address
     */
    private $physicalLocation;
    /**
     * @var Contact
     */
    private $contact;

	/**
	 * @var string
	 */
    private $companyId;

	/**
	 * @var TaxScheme
	 */
    private $taxScheme;

	/**
	 * @var LegalEntity
	 */
    private $legalEntity;

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setPostalAddress(Address $postalAddress) {
        $this->postalAddress = $postalAddress;
        return $this;
    }

	public function setCompanyId($companyId) {
    	$this->companyId = $companyId;
        return $this;
	}

    public function setTaxScheme($taxScheme) {
    	$this->taxScheme = $taxScheme;
    	return $this;
    }

    public function setLegalEntity($legalEntity) {
    	$this->legalEntity = $legalEntity;
    	return $this;
    }

    public function setPhysicalLocation($physicalLocation) {
        $this->physicalLocation = $physicalLocation;
        return $this;
    }

    public function setContact(Contact $contact) {
        $this->contact = $contact;
        return $this;
    }

    function xmlSerialize(Writer $writer) {
        $writer->write([
            Schema::CAC.'PartyName' => [
                Schema::CBC.'Name' => $this->name
            ],
            Schema::CAC.'PostalAddress' => $this->postalAddress
        ]);

	    if($this->taxScheme){
		    $writer->write([
			    Schema::CAC.'PartyTaxScheme' => [
				    Schema::CBC.'CompanyID' => $this->companyId,
                    Schema::CAC.'TaxScheme' => $this->taxScheme
			    ],
		    ]);
	    }

        if($this->physicalLocation){
            $writer->write([
               Schema::CAC.'PhysicalLocation' => [Schema::CAC.'Address' => $this->physicalLocation]
            ]);
        }

        if($this->contact){
            $writer->write([
                Schema::CAC.'Contact' => $this->contact
            ]);
        }

    }
}
