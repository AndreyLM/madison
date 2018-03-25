<?php
namespace Models\Entities;

use Models\Entities\PriceStrategy\LatestDatePriceStrategy;
use Models\Entities\PriceStrategy\PriceStrategy;
use Models\Entities\PriceStrategy\ShortestDatePriceStrategy;

class Product
{
    const PRICE_SHORTEST = 'byDuration';
    const PRICE_LATEST = 'byBeginning';

    public $id;
    public $name;
    public $discount;
    public $defaultPrice;
    public $priceStrategy;


    /* @var Price[]*/
    private $prices = [];

    /* @var PriceStrategy[] */
    private $priceStrategies = [];

    public function __construct($id = null, $name = '', $discount = 0, $defaultPrice = 0, $priceStrategy = self::PRICE_SHORTEST)
    {
        $this->id = $id;
        $this->name = $name;
        $this->defaultPrice = $defaultPrice;
        $this->discount = $discount;
        $this->priceStrategy = $priceStrategy;

        $this->addPriceStrategy(self::PRICE_SHORTEST, new ShortestDatePriceStrategy());
        $this->addPriceStrategy(self::PRICE_LATEST, new LatestDatePriceStrategy());
    }

    public function getAdditionalPrices(){
        return $this->prices;
    }

    public function addPrice(Price $price)
    {
        $this->prices[] = $price;
    }

    public function getCurrentPrice($priceStrategyKey = self::PRICE_SHORTEST) : int
    {
        $key = $priceStrategyKey;

        $priceStrategy = $this->priceStrategies[$key];

        return $priceStrategy->getCurrentPrice($this->defaultPrice, $this->prices, time());
    }

    public function getDynamicPriceChanging($priceStrategyKey = self::PRICE_LATEST) : array
    {
        $key = $priceStrategyKey;

        $priceStrategy = $this->priceStrategies[$key];

        return $priceStrategy->getDynamicPriceChanging($this->defaultPrice, $this->prices);
    }

    public function validate() : bool
    {
        return true;
    }

    public function addPriceStrategy($key, PriceStrategy $priceStrategy)
    {

        $this->priceStrategies[$key] = $priceStrategy;
    }

    public function clearPrices()
    {
        $this->prices = [];
    }

}