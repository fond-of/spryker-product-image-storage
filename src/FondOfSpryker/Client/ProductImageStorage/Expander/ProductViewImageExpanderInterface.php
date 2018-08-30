<?php

namespace FondOfSpryker\Client\ProductImageStorage\Expander;

use Generated\Shared\Transfer\ProductViewTransfer;

interface ProductViewImageExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     * @param string $locale
     * @param array $imageSetNamesArray
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expandProductViewImageData(ProductViewTransfer $productViewTransfer, $locale, $imageSetNamesArray = []);
}
