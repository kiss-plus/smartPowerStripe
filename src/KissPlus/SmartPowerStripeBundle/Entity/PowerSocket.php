<?php
namespace KissPlus\SmartPowerStripeBundle\Entity;

class PowerSocket
{
    /**
     * @var string UUID
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $turnedOn;

    /**
     * @var int
     */
    private $number;

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function setName($name) : self
    {
        $this->name = $name;
        return $this;
    }

    public function turnedOn()
    {
        return $this->turnedOn;
    }

    public function setTurnedOn($turnedOn) : self
    {
        $this->turnedOn = $turnedOn;
        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }
}
