<?php

namespace FondOfSpryker\Client\ProductImageStorage\Expander;

use FondOfSpryker\Shared\ProductImageStorage\ProductImageStorageConfig;
use FondOfSpryker\Shared\ProductImageStorage\ProductImageStorageConstants;
use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Client\ProductImageStorage\Expander\ProductViewImageExpander as SprykerProductViewImageExpander;

class ProductViewImageExpander extends SprykerProductViewImageExpander implements ProductViewImageExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     * @param string $locale
     * @param string $imageSetName
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expandProductViewImageData(ProductViewTransfer $productViewTransfer, $locale, $imageSetName = ProductImageStorageConfig::DEFAULT_IMAGE_SET_NAME)
    {
        $images = $this->getImages($productViewTransfer, $locale, $imageSetName);

        if ($images) {
            $productViewTransfer->setImages($images);
        }

        return $productViewTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     * @param $locale
     * @param array $imageSetNamesArray
     * @param \FondOfSpryker\Shared\ProductImageStorage\ProductImageStorageConfig $config
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expandProductViewImageDataByArray(
        ProductViewTransfer $productViewTransfer,
        $locale,
        ProductImageStorageConfig $config): ProductViewTransfer
    {
        $imageSetNamesArray = $config->getImageSets();
        $images = [];

        if (
            $config->allwaysDefaultImageSet() === true &&
            !in_array(ProductImageStorageConfig::DEFAULT_IMAGE_SET_NAME, $imageSetNamesArray)
        ) {
            array_push($imageSetNamesArray, ProductImageStorageConstants::DEFAULT_IMAGE_SET_NAME);
        }

        foreach($imageSetNamesArray as $imageSetName) {
            $images[strtoupper($imageSetName)] = $this->getImages($productViewTransfer, $locale, $imageSetName);
        }

        if (count($images) > 0) {
            $productViewTransfer->setImageSets($images);
        }

        return $productViewTransfer;
    }

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

    /**
     * @param \Generated\Shared\Transfer\ProductImageSetStorageTransfer[] $imageSetStorageCollection
     * @param string $imageSetName
     *
     * @return \Generated\Shared\Transfer\ProductImageStorageTransfer[]|null
     */
    protected function getImageSetImages($imageSetStorageCollection, $imageSetName)
    {
        foreach ($imageSetStorageCollection as $productImageSetStorageTransfer) {
            if ($productImageSetStorageTransfer->getName() !== $imageSetName) {
                continue;
            }

            return $productImageSetStorageTransfer->getImages();
        }

        if ($imageSetName !== ProductImageStorageConfig::DEFAULT_IMAGE_SET_NAME) {
            return $this->getImageSetImages($imageSetStorageCollection, ProductImageStorageConfig::DEFAULT_IMAGE_SET_NAME);
        }

        if (isset($imageSetStorageCollection[0])) {
            return $imageSetStorageCollection[0]->getImages();
        }

        return null;
    }
}
