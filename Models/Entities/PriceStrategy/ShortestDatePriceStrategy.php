<?php
namespace Models\Entities\PriceStrategy;


use Models\Entities\Price;

class ShortestDatePriceStrategy extends PriceStrategy
{
    public function getCurrentPrice($defaultPrice, array $prices, $date = null): int
    {
        $today = $date;
        $expiration = time();

        foreach($prices as $price) {
            if($today<$price->startDate || $today>$price->expirationDate) {
                continue;
            }

            $priceInterval = $price->expirationDate-$price->startDate;

            if($priceInterval < $expiration) {
                $defaultPrice = $price->value;
                $expiration = $priceInterval;
            }
        }

        return $defaultPrice;
    }
}