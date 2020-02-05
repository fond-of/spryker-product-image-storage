<?php

namespace FondOfSpryker\Shared\ProductImageStorage;

use Spryker\Shared\ProductImage\ProductImageConfig;

interface ProductImageStorageConstants
{
    public const ALLWAYS_ADD_DEFAULT_IMAGE_SET = 'ALLWAYS_ADD_DEFAULT_IMAGE_SET';

    public const IMAGES_SET_TO_ADD = 'IMAGES_SET_TO_ADD';

    public const DEFAULT_IMAGE_SET_NAME = ProductImageConfig::DEFAULT_IMAGE_SET_NAME;

    public const IMAGE_SET_ADDITIONAL = 'AdditionalImage';

    public const IMAGE_SET_THUMBNAIL = 'Thumbnail';

    public const IMAGE_SET_BASEIMAGE = 'BaseImage';

    public const IMAGE_SET_HOVERIMAGE = 'HoverImage';
}
