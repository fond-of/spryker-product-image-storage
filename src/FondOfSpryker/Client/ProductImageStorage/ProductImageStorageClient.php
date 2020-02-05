<?php

namespace FondOfSpryker\Client\ProductImageStorage;

use Spryker\Client\Kernel\AbstractClient;
use Spryker\Client\ProductImageStorage\Storage\ProductAbstractImageStorageReaderInterface;

/**
 * Class ProductImageStorageClient
 *
 * @package FondOfSpryker\Client\ProductImageStorage
 * @method \FondOfSpryker\Client\ProductImageStorage\ProductImageStorageFactory getFactory()
 */
class ProductImageStorageClient extends AbstractClient implements ProductImageStorageClientInterface
{
    public function getProductAbstractImageStorageReader(): ProductAbstractImageStorageReaderInterface
    {
        return $this->getFactory()->createProductAbstractImageStorageReader();
    }
}
