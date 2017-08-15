<?php
/**
 * Acaldeira_SimpleApi
 *
 * @category    Acaldeira
 * @package     Acaldeira_SimpleApi
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */

namespace Acaldeira\SimpleApi\Model;

use Acaldeira\SimpleApi\Api\Data\SimpleProductInterface;

class SimpleProduct extends \Magento\Catalog\Model\AbstractModel implements SimpleProductInterface
{

    /**
     * Name
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string[] $images
     * @return $this
     */
    public function setImagesUrl($images)
    {
        $this->images = $images;
    }

    /**
     * @return string[]|null
     */
    public function getImagesUrl()
    {
        return $this->images;
    }

    /**
     * Price
     *
     * @param \Magento\ConfigurableProduct\Api\Data\OptionInterface[] $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return \Magento\ConfigurableProduct\Api\Data\OptionInterface[]|null
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Price
     *
     * @return float|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Price
     *
     * @param float $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}
