<?php
/**
 * Acaldeira_SimpleApi
 *
 * @category    Acaldeira
 * @package     Acaldeira_SimpleApi
 * @copyright   Copyright (c) 2017 Acaldeira. (http://www.acaldeira.com.br)
 */

namespace Acaldeira\SimpleApi\Api;

interface SimpleProductManagementInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param integer $id Product id.
     * @return \Acaldeira\SimpleApi\Api\Data\SimpleProductInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get($id);
}