<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/23/18
 * Time: 1:38 PM
 */

namespace Models\Entities\PriceStrategy;


use Models\Entities\Price;

class LatestDatePriceStrategy extends PriceStrategy
{

    /**
     * @param $defaultPrice
     * @param array $prices
     * @param null $date
     * @return int
     */
    public function getCurrentPrice($defaultPrice, array $prices, $date = null): int
    {
        $today = $date;
        $startDate = 0;
        $currentPrice = $defaultPrice;

        /* @var $price Price */
        foreach($prices as $price) {
            if($today<$price->startDate || $today>$price->expirationDate) {
                continue;
            }


           if($startDate < $price->startDate) {
                $startDate = $price->startDate;
                $currentPrice = $price->value;
           }

        }

        return $currentPrice;
    }


}