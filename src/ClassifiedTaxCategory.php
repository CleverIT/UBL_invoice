<?php namespace CleverIt\UBL\Invoice;


use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class ClassifiedTaxCategory implements XmlSerializable {
    private $ID;
    private $Percent;
    private $TaxSchemeId = 'VAT';

    function xmlSerialize(Writer $writer) {
        $writer->write([
           Schema::CBC.'ID' => $this->ID,
           Schema::CBC.'Percent' => $this->Percent,
           Schema::CAC.'TaxScheme' => [
               Schema::CBC.'ID' => $this->TaxSchemeId
           ]
        ]);
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
        return $this;
    }

    /**
     * @param mixed $Percent
     */
    public function setPercent($Percent)
    {
        $this->Percent = $Percent;
        return $this;
    }

    /**
     * @param mixed $TaxSchemeId
     */
    public function setTaxSchemeId($TaxSchemeId)
    {
        $this->TaxSchemeId = $TaxSchemeId;
        return $this;
    }
}
