<?php

namespace FondOfSpryker\Client\ProductImageStorage;

use FondOfSpryker\Client\ProductImageStorage\Expander\ProductViewImageExpander;
use FondOfSpryker\Shared\ProductImageStorage\ProductImageStorageConfig;
use Spryker\Client\ProductImageStorage\ProductImageStorageFactory as SprykerProductImageStorageFactory;
use Spryker\Client\ProductImageStorage\Storage\ProductAbstractImageStorageReader;

class ProductImageStorageFactory extends SprykerProductImageStorageFactory
{
    /**
     * @return \FondOfSpryker\Client\ProductImageStorage\Expander\ProductViewImageExpander
     */
    public function createProductViewImageExpander(): ProductViewImageExpander
    {
        return new ProductViewImageExpander(
            $this->createProductAbstractImageStorageReader(),
            $this->createProductConcreteImageStorageReader()
        );
    }

    public function createSharedConfig(): ProductImageStorageConfig
    {
        return new ProductImageStorageConfig();
    }

    /**
     * @return \Spryker\Client\ProductImageStorage\Storage\ProductAbstractImageStorageReaderInterface
     */
    public function createProductAbstractImageStorageReader()
    {
        return new ProductAbstractImageStorageReader(
            $this->getStorage(),
            $this->createProductImageStorageKeyGenerator()
        );
    }
}
