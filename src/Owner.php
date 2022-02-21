<?php

namespace Medoko\Petlocator;

class Owner
{
    private string $name;
    private string $number;

    /**
     * @param string $name
     * @param string $number
     */
    public function __construct(string $name, string $number)
    {
        $this->name = $name;
        $this->number = $number;
    }



    public function __toString(){
        return $this->getNumber();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

}