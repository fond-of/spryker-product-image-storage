<?php

namespace FondOfSpryker\Client\ProductImageStorage;

use FondOfSpryker\Client\ProductImageStorage\Expander\ProductViewImageExpander;
use Spryker\Client\ProductImageStorage\ProductImageStorageFactory as SprykerProductImageStorageFactory;

class ProductImageStorageFactory extends SprykerProductImageStorageFactory
{
    /**
     * @return \FondOfSpryker\Client\ProductImageStorage\Expander\ProductViewImageExpander|\Spryker\Client\ProductImageStorage\Expander\ProductViewImageExpanderInterface
     */
    public function createProductViewImageExpander()
    {
        dump(__METHOD__);

        return new ProductViewImageExpander(
            $this->createProductAbstractImageStorageReader(),
            $this->createProductConcreteImageStorageReader()
        );
    }
}
