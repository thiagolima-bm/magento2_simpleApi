<?php
/**
 * Acaldeira_SimpleApi
 *
 * @category    Acaldeira
 * @package     Acaldeira_SimpleApi
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */
namespace Acaldeira\SimpleApi\Model;

use Acaldeira\SimpleApi\Api\Data\CostCalculationInterface;


class CostCalculation  extends \Magento\Catalog\Model\AbstractModel implements CostCalculationInterface
{
    protected $productId;

    /**
     * Product id
     *
     * @return int|null
     */
    public function getProductId()
    {
       return $this->productId;
    }

    /**
     * Product id
     *
     * @param int $productId
     * @return $this
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Product id
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Product id
     *
     * @param string $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Product id
     *
     * @return string|null
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Product id
     *
     * @param string $region
     * @return $this
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * Postcode
     *
     * @return string|null
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Postcode
     *
     * @param string $postcode
     * @return $this
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }
}
