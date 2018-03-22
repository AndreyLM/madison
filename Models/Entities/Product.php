<?php
namespace Models\Entities;

class Product
{
    public $id;
    public $name;
    public $discount;
    public $defaultPrice;

    /* @var Price[]*/
    private $prices = [];

    public function __construct($id, $name, $discount, $defaultPrice)
    {
        $this->id = $id;
        $this->name = $name;
        $this->defaultPrice = $defaultPrice;
        $this->discount = $discount;
    }

    public function getAdditionalPrices(){
        return $this->prices;
    }

    public function addPrice(Price $price)
    {
        $this->prices[] = $price;
    }

}