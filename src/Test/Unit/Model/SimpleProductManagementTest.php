<?php
/**
 * Acaldeira_SimpleApi
 *
 * @category    SimpleApi
 * @package     Acaldeira_SimpleApi
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */

namespace Acaldeira\SimpleApi\Test\Unit\Model;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager as ObjectManagerHelper;

class SimpleTemplateManagementTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Acaldeira\SimpleApi\Model\SimpleProductManagement
     */
    protected $model;

    protected function setUp()
    {

        $this->objectManagerHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        $this->productFactory = $this->objectManagerHelper->getObject('\Magento\Catalog\Model\ProductFactory');
        $this->imageHelper = $this->objectManagerHelper->getObject('\Magento\Catalog\Helper\Image');
        $this->optionRepository = $this->objectManagerHelper->getObject('\Magento\ConfigurableProduct\Model\OptionRepository');
        $this->simpleProduct = $this->objectManagerHelper->getObject('\Acaldeira\SimpleApi\Model\SimpleProduct');

        $this->model = $this->objectManagerHelper->getObject(
            '\Acaldeira\SimpleApi\Model\SimpleProductManagement',
            [
                'productFactory' => $this->productFactory,
                'imageHelper' => $this->imageHelper,
                'optionRepository' => $this->optionRepository,
                'simpleProduct' => $this->simpleProduct
            ]
        );
    }

    public function testTrue()
    {
        $this->assertNull(null);
    }

}
