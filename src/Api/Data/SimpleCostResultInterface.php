<?php
/**
 * Acaldeira_SimpleApi
 *
 * @category    Acaldeira
 * @package     Acaldeira_SimpleApi
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */

namespace Acaldeira\SimpleApi\Api\Data;

interface SimpleCostResultInterface
{
    /**
     * Total price
     *
     * @return float|null
     */
    public function getTotalPrice();

    /**
     * Total price
     *
     * @param float $totalPrice
     * @return $this
     */
    public function setTotalPrice($totalPrice);

    /**
     * @param \Magento\Quote\Api\Data\ShippingMethodInterface[] $shippingRates
     * @return $this
     */
    public function setShippingRates($shippingRates);

    /**
     * @return \Magento\Quote\Api\Data\ShippingMethodInterface[] $shippingRates
     */
    public function getShippingRates();

    /**
     * Tax cost
     *
     * @return float|null
     */
    public function getTaxCost();

    /**
     * Tax cost
     *
     * @param float $taxCost
     * @return $this
     */
    public function setTaxCost($taxCost);
}