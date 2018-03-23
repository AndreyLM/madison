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

        for ($i = 0; $i<count($dateIntervals)-1; $i++) {
            $startDate = $dateIntervals[$i];
            $endDate = $dateIntervals[$i+1];
            $value = $this->getCurrentPrice($defaultPrice, $prices, ($endDate+$startDate)/2);

            $result[] = new Price($i+1, $value, $startDate, $endDate);
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

    public function normalizeIntervals($prices) : array
    {
        $result = [];
        $value = $prices[0]->value;
        $startDate = $prices[0]->startDate;
        $expirationDate = $prices[0]->expirationDate;
        $next = false;
        $latestPrice = null;

        /* @var $prices Price[] */
        for($i=1; $i<count($prices)-1; $i++)
        {
            if($prices[$i]->value == $value) {
               $latestPrice = $prices[$i];
               $next = true;
            }

        }

        return $result;
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