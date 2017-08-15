<?php
/**
 * Acaldeira_SimpleApi
 *
 * @category    Acaldeira
 * @package     Acaldeira_SimpleApi
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */

namespace Acaldeira\SimpleApi\Model;

use Acaldeira\SimpleApi\Api\SimpleProductManagementInterface;
use \Magento\Framework\Exception\NoSuchEntityException;
use \Magento\Catalog\Helper\Image;
use \Magento\Catalog\Model\ProductFactory;
use \Magento\ConfigurableProduct\Api\OptionRepositoryInterface as OptionRepository;




class SimpleProductManagement implements SimpleProductManagementInterface
{

    /**
     * @var \Magento\Catalog\Model\ProductFactory
     */
    protected $productFactory;

    /**
     * @var Image
     */
    protected $imageHelper;

    protected $optionRepository;

    public function __construct(
        ProductFactory $productFactory,
        Image $imageHelper,
        OptionRepository $optionRepository,
        SimpleProduct $simpleProduct

    ) {
        $this->productFactory = $productFactory;
        $this->imageHelper = $imageHelper;
        $this->optionRepository = $optionRepository;
        $this->simpleProduct = $simpleProduct;
    }

    /**
     * @param $id
     * @return \Acaldeira\SimpleApi\Api\Data\SimpleProductInterface
     * @throws NoSuchEntityException
     */
    public function get($id)
    {

        $product = $this->productFactory->create();
        $product->load($id);

        if (!$product->getId()) {
            throw new NoSuchEntityException(__('Requested product doesn\'t exist'));
        }

        $options = $this->getOptions($product);
        $this->simpleProduct->setName($product->getName());
        $this->simpleProduct->setPrice($product->getPrice());
        $this->simpleProduct->setImagesUrl($this->getImages($product));
        $this->simpleProduct->setOptions($options);

        return $this->simpleProduct;
    }

    /**
     * @param $product
     * @return array|\Magento\ConfigurableProduct\Api\Data\OptionInterface[]
     */
    private function getOptions($product)
    {
        try {

            return $this->optionRepository->getList($product->getSku());

        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {

        } catch ( \Magento\Framework\Exception\InputException $e) {

        }

            return [];

    }

    /**
     * @param \Magento\Catalog\Api\Data\ProductInterface $product
     * @return string[]
     */
    private function getImages($product)
    {
        $images = [];
        foreach ($product->getMediaGalleryEntries() as $galleryEntry) {

            $images[] = $this->imageHelper->init($product, 'product_page_image_large')
                ->setImageFile($galleryEntry->getFile())
                ->getUrl();
        }
        return $images;
    }
}