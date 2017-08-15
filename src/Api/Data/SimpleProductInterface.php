<?php
/**
 * Acaldeira_SimpleApi
 *
 * @category    Acaldeira
 * @package     Acaldeira_SimpleApiw
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */

namespace Acaldeira\SimpleApi\Api\Data;

interface SimpleProductInterface
{

    /**
     * Name
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Name
     *
     * @return string|null
     */
    public function getName();

    /**
     * @param string[] $images
     * @return $this
     */
    public function setImagesUrl($images);

    /**
     * Images Url
     *
     * @return string[]|null
     */
    public function getImagesUrl();

    /**
     * Price
     *
     * @param \Magento\ConfigurableProduct\Api\Data\OptionInterface[] $options
     * @return $this
     */
    public function setOptions($options);

    /**
     * Options
     *
     * @return \Magento\ConfigurableProduct\Api\Data\OptionInterface[]|null
     */
    public function getOptions();

    /**
     * Price
     *
     * @return float|null
     */
    public function getPrice();

    /**
     * Price
     *
     * @param float $price
     * @return $this
     */
    public function setPrice($price);
}