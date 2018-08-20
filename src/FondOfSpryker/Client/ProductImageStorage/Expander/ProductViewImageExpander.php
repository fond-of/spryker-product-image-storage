<?php

namespace FondOfSpryker\Client\ProductImageStorage\Expander;

use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Client\ProductImageStorage\Expander\ProductViewImageExpander as SprykerProductViewImageExpander;

class ProductViewImageExpander extends SprykerProductViewImageExpander
{
    /**
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     * @param string $locale
     * @param string $imageSetName
     *
     * @return \Generated\Shared\Transfer\ProductImageStorageTransfer[]|null
     */
    protected function getImages(ProductViewTransfer $productViewTransfer, $locale, $imageSetName)
    {
        $productAbstractImageSetCollection = $this->productAbstractImageSetReader
            ->findProductImageAbstractStorageTransfer($productViewTransfer->getIdProductAbstract(), $locale);

        if (!$productAbstractImageSetCollection) {
            return null;
        }

        return $this->getImageSetImages($productAbstractImageSetCollection->getImageSets(), $imageSetName);
    }
}
