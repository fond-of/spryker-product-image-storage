<?php

namespace FondOfSpryker\Shared\ProductImageStorage;

use Spryker\Shared\ProductImageStorage\ProductImageStorageConfig as SprykerProductImageStorageConfig;
use FondOfSpryker\Shared\ProductImageStorage\ProductImageStorageConstants;

class ProductImageStorageConfig extends SprykerProductImageStorageConfig
{
    const DEFAULT_IMAGE_SETS = [
        ProductImageStorageConstants::IMAGE_SET_ADDITIONAL,
    ];

    public function allwaysDefaultImageSet(): bool
    {
        return $this->get(ProductImageStorageConstants::ALLWAYS_ADD_DEFAULT_IMAGE_SET, false);
    }

    public function getImageSets(): array
    {
        return $this->get(ProductImageStorageConstants::IMAGES_SET_TO_ADD, self::DEFAULT_IMAGE_SETS);
    }
}
