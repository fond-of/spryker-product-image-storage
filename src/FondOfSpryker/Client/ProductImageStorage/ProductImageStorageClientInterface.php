<?php

namespace FondOfSpryker\Client\ProductImageStorage;

use Spryker\Client\ProductImageStorage\Storage\ProductAbstractImageStorageReaderInterface;

interface ProductImageStorageClientInterface
{
    public function getProductAbstractImageStorageReader(): ProductAbstractImageStorageReaderInterface;
}
