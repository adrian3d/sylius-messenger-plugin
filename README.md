# AkkiSyliusMessengerPlugin

## Overview

This plugin works with ```symfony/messenger``` and Sylius.

With two new stamps (```LocaleStamp``` and ```ChannelStamp```) you can set the locale and channel context directly in your message.
The context will be automatically set when the message will be consumed.

## Installation

1. Install the plugin to your project with the following command:

```bash
$ composer require akki-team/sylius-messenger-plugin
```

2. After the installation, check that the plugin is correctly declared in your project in the file `config/bundles.php`.

```php

 return [
    ...
    Akki\SyliusMessengerPlugin\AkkiSyliusMessengerPlugin::class => ['all' => true],
];
 ```

## Example

```php

use Akki\SyliusMessengerPlugin\Stamp\ChannelStamp;
use Akki\SyliusMessengerPlugin\Stamp\LocaleStamp;

$envelope = new Envelope(new MyMessage(), [
    new LocaleStamp('en_US'),
    new ChannelStamp('web'),
]);

$this->bus->dispatch($envelope);
```
