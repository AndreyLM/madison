<?php
namespace Models\Entities\PriceStrategy;

interface IPriceStrategy
{
    public function getCurrentPrice($defaultPrice, array $prices, $date = null) : int;

    public function getDynamicPriceChanging($defaultPrice, $prices) : array;

}