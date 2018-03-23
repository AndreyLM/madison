<?php
namespace Models\Entities\PriceStrategy;


use Models\Entities\Price;

class ShortestDatePriceStrategy implements IPriceStrategy
{
    /**
     * @param $defaultPrice
     * @param $prices Price[]
     * @return array
     */
    public function getDynamicPriceChanging($defaultPrice, $prices): array
    {
        $result = [];

        $dateIntervals = $this->makeDateIntervals($prices);

        for ($i = 0; $i<count($dateIntervals)-2; $i++) {
            $startDate = $dateIntervals[$i];
            $endDate = $dateIntervals[$i+1];
            $value = $this->getCurrentPrice($defaultPrice, $prices, ($endDate+$startDate)/2);

            $result[] = new Price($i, $value, $startDate, $endDate);
        }

        return $result;
    }

    private function makeDateIntervals(array $prices)
    {
        $result = [];

        /* @var $price Price */
        foreach ($prices as $price) {
            $result[] = $price->startDate;
            $result[] = $price->expirationDate;
        }

        asort($result);
        $dates = [];

        foreach ($result as $item) {
            $dates[] = $item;
        }

        return $dates;
    }

    /**
     * @param $defaultPrice
     * @param array $prices
     * @param null $date int
     * @return int
     */
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