# fond-of-spryker/product-image-storage
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/fond-of-spryker/google-custom-search)

Add more multiple image sets to your product.

By default, only one image is provided in the ProductViewTransfer object. This module adds a 
new field to "ProductViewTransfer" which called "imageSets". In this field you can add your 
own image sets as much as you like.

## Install

```
composer require fond-of-spryker/product-image-storage
```

```
vendor/bin/console transfer:generate
```

## Configuration

Open the existing "ProductStorageDependencyProvider" (mostly stored in Pyz\Client\ProductStorage) and replace
the ProductViewImageExpanderPlugin() with the new one of this module.

```
use FondOfSpryker\Client\ProductImageStorage\Plugin\ProductViewImageExpanderPlugin;
```

After that you only need to configure which image sets you want. Open your store config 
and lets insert some image sets :)

```
// ---------- Image sets
 $config[\FondOfSpryker\Shared\ProductImageStorage\ProductImageStorageConstants::IMAGES_SET_TO_ADD] = [
     'SetOne',
     'SetTow'
 ];'
```

Take a look in ZED to get the name of your sets.
