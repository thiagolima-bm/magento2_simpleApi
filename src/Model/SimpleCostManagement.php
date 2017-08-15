<?php
/**
 * Acaldeira_SimpleApi
 *
 * @category    Acaldeira
 * @package     Acaldeira_SimpleApi
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */

namespace Acaldeira\SimpleApi\Model;

use \Magento\Quote\Api\Data\AddressInterface;
use \Magento\Quote\Model\Quote;
use \Acaldeira\SimpleApi\Api\Data\CostCalculationInterface;
use \Magento\Directory\Model\RegionFactory;
use \Magento\Quote\Api\CartRepositoryInterface;
use \Magento\Quote\Api\CartTotalRepositoryInterface;
use \Magento\Catalog\Model\ProductFactory;
use \Acaldeira\SimpleApi\Api\Data\SimpleCostResultInterface;
use \Magento\Quote\Api\ShipmentEstimationInterface;

class SimpleCostManagement
{

    /**
     * @var ShipmentEstimationInterface
     */
    protected $shippingEstimation;

    public function __construct(
        AddressInterface $address,
        Quote $quote,
        ProductFactory $productFactory,
        RegionFactory $regionFactory,
        CartRepositoryInterface $cartRepository,
        CartTotalRepositoryInterface $cartTotalRepository,
        SimpleCostResultInterface $costResult,
        ShipmentEstimationInterface $shippingEstimation
    )
    {
        $this->address = $address;
        $this->quote = $quote;
        $this->productFactory = $productFactory;
        $this->regionFactory = $regionFactory;
        $this->cartRepository = $cartRepository;
        $this->cartTotalRepository = $cartTotalRepository;
        $this->costResult = $costResult;
        $this->shippingEstimation = $shippingEstimation;

    }

    /**
     * @api
     * @param \Acaldeira\SimpleApi\Api\Data\CostCalculationInterface $options
     * @return \Acaldeira\SimpleApi\Api\Data\SimpleCostResultInterface
     */
    public function calculateCost(CostCalculationInterface $options)
    {

        try {

            $region = $this->getRegion($options);
            $this->loadAddress($region, $options->getPostcode());
            $product = $this->getProduct($options);
            $this->loadQuote($product, $this->address);
            $shippingRates = $this->shippingEstimation->estimateByExtendedAddress($this->quote->getId(), $this->address);
            $totals =  $this->cartTotalRepository->get($this->quote->getId());

            $this->costResult->setTotalPrice($totals->getGrandTotal());
            $this->costResult->setShippingRates($shippingRates);
            $this->costResult->setTaxCost($totals->getTaxAmount());

            return $this->costResult;

        } catch (\Magento\Framework\Exception\LocalizedException $exception) {

            return [$exception->getMessage()];
        }

    }


    /**
     * @param $options
     * @return $this
     */
    private function getRegion($options)
    {
        return $this->regionFactory->create()->loadByName($options->getRegion(), $options->getCountry());
    }

    /**
     * @param $options
     * @return mixed
     */
    private function getProduct($options)
    {
        $product = $this->productFactory->create();
        $product->load($options->getProductId());
        return $product;
    }

    /**
     * @param $region
     * @param $postcode
     */
    private function loadAddress($region, $postcode)
    {

        $this->address->setCountryId($region->getCountryId())
            ->setRegionId($region->getId())
            ->setPostcode($postcode);
    }

    /**
     * @param $product
     * @param $address
     */
    private function loadQuote($product, $address)
    {
        $this->quote->setStoreId(1)
            ->setIsActive(true)
            ->setIsMultiShipping(false)
            ->setShippingAddress($address)
            ->setBillingAddress($address)
            ->addProduct($product, 1);
        $this->cartRepository->save($this->quote->collectTotals());
    }

}