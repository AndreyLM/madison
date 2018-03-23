<?php
namespace Models\Entities;

use Models\Entities\PriceStrategy\IPriceStrategy;

class Product
{
    const PRICE_SHORTEST = 'shortest';
    const PRICE_LATEST = 'latest';

    public $id;
    public $name;
    public $discount;
    public $defaultPrice;
    public $priceStrategy;


    /* @var Price[]*/
    private $prices = [];

    /* @var IPriceStrategy[] */
    private $priceStrategies = [];

    public function __construct($id = null, $name = '', $discount = 0, $defaultPrice = 0, $priceStrategy)
    {
        $this->id = $id;
        $this->name = $name;
        $this->defaultPrice = $defaultPrice;
        $this->discount = $discount;
        $this->priceStrategy = $priceStrategy;
    }

    public function getAdditionalPrices(){
        return $this->prices;
    }

    public function addPrice(Price $price)
    {
        $this->prices[] = $price;
    }

    public function getCurrentPrice($priceStrategyKey = '') : int
    {
        $priceStrategyKey === '' ? $key = $this->priceStrategy : $key = $priceStrategyKey;

        $priceStrategy = $this->priceStrategies[$key];

        return $priceStrategy->getCurrentPrice($this->defaultPrice, $this->prices, time());
    }

    public function getDynamicPriceChanging($priceStrategyKey = '') : array
    {
        $priceStrategyKey === '' ? $key = $this->priceStrategy : $key = $priceStrategyKey;

        $priceStrategy = $this->priceStrategies[$key];

        return $priceStrategy->getDynamicPriceChanging($this->defaultPrice, $this->prices);
    }

    public function validate() : bool
    {
        return true;
    }

    public function addPriceStrategy($key, IPriceStrategy $priceStrategy)
    {

        $this->priceStrategies[$key] = $priceStrategy;
    }

    public function clearPrices()
    {
        $this->prices = [];
    }

}