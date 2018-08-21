<?php

namespace FondOfSpryker\Client\ProductImageStorage\Plugin;

use FondOfSpryker\Shared\ProductImageStorage\ProductImageStorageConfig;
use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Client\ProductImageStorage\Plugin\ProductViewImageExpanderPlugin as SprykerProductViewImageExpanderPlugin;

/**
 * @method \FondOfSpryker\Client\ProductImageStorage\ProductImageStorageFactory getFactory()
 */
class ProductViewImageExpanderPlugin extends SprykerProductViewImageExpanderPlugin
{
    /**
     * @var string
     */
    protected $imageSetName;

    /**
     * @param \Generated\Shared\Transfer\ProductViewTransfer $storageProductTransfer
     * @param array $productData
     * @param string $localeName
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expandProductViewTransfer(ProductViewTransfer $storageProductTransfer, array $productData, $localeName)
    {
        return $this->getFactory()
            ->createProductViewImageExpander()
            ->expandProductViewImageDataByArray(
                $storageProductTransfer,
                $localeName,
                $this->getFactory()->createSharedConfig()
            );
    }
}
