# MockeryWpBridge

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gwa/mockery-wp-bridge.svg?style=flat-square)](https://packagist.org/packages/gwa/mockery-wp-bridge)
[![Total Downloads](https://img.shields.io/packagist/dt/gwa/mockery-wp-bridge.svg?style=flat-square)](https://packagist.org/packages/gwa/mockery-wp-bridge)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

## Master

[![Build Status](https://img.shields.io/travis/gwa/MockeryWPBridge/master.svg?style=flat-square)](https://travis-ci.org/gwa/MockeryWPBridge)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/gwa/MockeryWPBridge.svg?style=flat-square)](https://scrutinizer-ci.com/g/gwa/MockeryWPBridge/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/gwa/MockeryWPBridge.svg?style=flat-square)](https://scrutinizer-ci.com/g/gwa/MockeryWPBridge)

## Install

Via Composer

``` bash
$ composer require gwa/mockery-wp-bridge
```

## Usage

First init ```MockeryWpBridge``` class.

```php
$bridge = new \Gwa\Wordpress\MockeryWpBridge\MockeryWpBridge();
```

Now it allows us to use a class to call methods in the global namespace.
Methods should be called in camelcase.

``` php
// To call
wp_get_attachment_image_src(...);

// use
$bridge->wpGetAttachmentImageSrc(...);
```

Or you like to use a trait, than set ```WpBridgeTrait``` in a class.

```php
use Gwa\Wordpress\MockeryWpBridge\Traits\WpBridgeTrait;

class TestClass
{
    use WpBridgeTrait;

    public function testFunc()
    {
        $img = $this->getWPBridge()->wpGetAttachmentImageSrc(...);

        ...
    }
}

$test = new TestClass();
$test->setWPBridge($bridge);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email groves@greatwhiteark.com instead of using the issue tracker.

## Credits

- [Great White Ark](https://github.com/gwa)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
