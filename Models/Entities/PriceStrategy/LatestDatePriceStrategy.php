<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/23/18
 * Time: 1:38 PM
 */

namespace Models\Entities\PriceStrategy;


class LatestDatePriceStrategy implements IPriceStrategy
{

    /**
     * @param $defaultPrice
     * @param array $prices
     * @param null $date
     * @return int
     */
    public function getCurrentPrice($defaultPrice, array $prices, $date = null): int
    {
        // TODO: Implement getCurrentPrice() method.
    }

    /**
     * @param $defaultPrice
     * @param $prices
     * @return array
     */
    public function getDynamicPriceChanging($defaultPrice, $prices): array
    {
        // TODO: Implement getDynamicPriceChanging() method.
    }
}