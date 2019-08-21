<?php namespace CleverIt\UBL\Invoice;


use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Contact implements XmlSerializable{
    private $name;
    private $telephone;
    private $telefax;
    private $electronicMail;

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setTelephone($telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function setTelefax($telefax): self
    {
        $this->telefax = $telefax;

        return $this;
    }

    public function setElectronicMail($electronicMail): self
    {
        $this->electronicMail = $electronicMail;

        return $this;
    }

    function xmlSerialize(Writer $writer) {
        $writer->write([
            Schema::CBC.'Name' => $this->name,
            Schema::CBC.'Telephone' => $this->telephone,
            Schema::CBC.'Telefax' => $this->telefax,
            Schema::CBC.'ElectronicMail' => $this->electronicMail,
        ]);
    }
}
