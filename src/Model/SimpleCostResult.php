<?php
/**
 * Acaldeira_SimpleApi
 *
 * @category    Acaldeira
 * @package     Acaldeira_SimpleApi
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */

namespace Acaldeira\SimpleApi\Model;

use Acaldeira\SimpleApi\Api\Data\SimpleCostResultInterface;

class SimpleCostResult extends \Magento\Catalog\Model\AbstractModel implements SimpleCostResultInterface
{

    /**
     * Total price
     *
     * @return int|null
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Total price
     *
     * @param int $totalPrice
     * @return $this
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @param \Magento\Quote\Api\Data\ShippingMethodInterface[] $shippingRates
     * @return $this
     */
    public function setShippingRates($shippingRates)
    {
        $this->shippingRates = $shippingRates;
    }

    /**
     * @return \Magento\Quote\Api\Data\ShippingMethodInterface[]
     */
    public function getShippingRates()
    {
        return $this->shippingRates;
    }

    /**
     * Tax cost
     *
     * @return float|null
     */
    public function getTaxCost()
    {
        return $this->taxCost;
    }

    /**
     * Tax cost
     *
     * @param float $taxCost
     * @return $this
     */
    public function setTaxCost($taxCost)
    {
        $this->taxCost = $taxCost;
    }
}
