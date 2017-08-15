<?php
/**
 * Acaldeira_SimpleApi
 *
 * @category    Acaldeira
 * @package     Acaldeira_SimpleApi
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */
namespace Acaldeira\SimpleApi\Api\Data;

interface CostCalculationInterface
{

    /**
     * Product Id
     */
    const PRODUCT_ID = 'product_id';

    const COUNTRY = 'country';

    const REGION = 'region';

    /**
     * Product id
     *
     * @return int|null
     */
    public function getProductId();

    /**
     * Product id
     *
     * @param int $productId
     * @return $this
     */
    public function setProductId($productId);

    /**
     * country
     *
     * @return string|null
     */
    public function getCountry();

    /**
     * country
     *
     * @param string $country
     * @return $this
     */
    public function setCountry($country);


    /**
     * region
     *
     * @return string|null
     */
    public function getRegion();

    /**
     * region
     *
     * @param string $region
     * @return $this
     */
    public function setRegion($region);


    /**
     * Postcode
     *
     * @return string|null
     */
    public function getPostcode();

    /**
     * Postcode
     *
     * @param string $postcode
     * @return $this
     */
    public function setPostcode($postcode);
}