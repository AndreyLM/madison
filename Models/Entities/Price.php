<?php
namespace Models\Entities;

class Price
{
    public $id;
    public $value;
    public $startDate;
    public $expirationDate;

    public function __construct($id, $value, $startDate, $expirationDate)
    {

        $this->id = $id;
        $this->value = $value;
        $this->startDate = $startDate;
        $this->expirationDate = $expirationDate;
    }
}