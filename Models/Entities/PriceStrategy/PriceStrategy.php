<?php
namespace Models\Entities\PriceStrategy;

use Models\Entities\Price;

abstract class PriceStrategy
{


    /**
     * @param $defaultPrice
     * @param array $prices
     * @param null $date int
     * @return int
     */
    abstract public function getCurrentPrice($defaultPrice, array $prices, $date = null): int;

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

        return $this->normalizeIntervals($result);
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
        $next = true;
        $latestPrice = null;

        /* @var $prices Price[] */
        for($i=0; $i<=count($prices); $i++)
        {
            if($prices[$i]->value === $value && $next) {
                $expirationDate = $prices[$i]->expirationDate;
                $next = true;
                continue;
            }
            if($prices[$i]->value !== $value) {
                $next = false;
                $result[] = new Price($i, $value, $startDate, $expirationDate);
                $startDate = $prices[$i]->startDate;
                $expirationDate = $prices[$i]->expirationDate;
                $value = $prices[$i]->value;
            }



        }

        return $result;
    }



}