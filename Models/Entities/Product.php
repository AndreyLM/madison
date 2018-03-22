<?php
namespace Models\Entities;

class Product
{
    public $id;
    public $name;
    public $discount;
    public $defaultPrice;
    public $exp;

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

    public function getCurrentPrice()
    {
        $currentPrice = $this->defaultPrice;
        $today = time();
        $expiration = time();

        foreach($this->prices as $price) {
            if($today<$price->startDate || $today>$price->expirationDate) {
                continue;
            }

            $priceInterval = $price->expirationDate-$price->startDate;

            if($priceInterval < $expiration) {
                $currentPrice = $price->value;
                $expiration = $priceInterval;
            }
        }

        return $currentPrice;
    }

}