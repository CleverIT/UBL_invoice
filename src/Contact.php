<?php namespace CleverIt\UBL\Invoice;


use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Contact implements XmlSerializable{
    private $name;
    private $telephone;

    function xmlSerialize(Writer $writer) {
        $writer->write([
            Schema::CBC.'Name' => $this->name,
            Schema::CBC.'Telephone' => $this->telephone
        ]);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     * @return self
     */
    public function setTelephone($telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }
}
