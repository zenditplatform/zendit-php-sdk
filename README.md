# Zendit SDK for PHP

The Zendit SDK for PHP allows developers to easily interact with the Zendit API using PHP.
The SDK provides convenient methods for making API requests and handling responses, abstracting away the details of HTTP requests.

## Installation & Usage

### Requirements

PHP 7.4 and later.
Also compatible with PHP 8.0 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "require": {
    "zenditplatform/zendit-php-sdk": "^1.0.0"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/ZenditAPIClient/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

> **Note:** Your API key can be found on the [Zendit Dashboard](https://console.zendit.io/).

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_API_KEY');

try {
    $result = $apiInstance->balanceGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->balanceGet: ', $e->getMessage(), PHP_EOL;
}

```

## Example Application

If you prefer, you can get started with our [example app](https://github.com/zenditplatform/zendit-php-sdk/blob/main/example) as a base.

### Step 1: Setup a New Project

Begin by copying the [example app](https://github.com/zenditplatform/zendit-php-sdk/blob/main/example) to your own directory. Once done, install the necessary dependencies by running the following command in your terminal:

```bash
composer install
```

### Step 2: Configuration
Next, you'll need to set the ZENDIT_API_KEY environment variable. 
You can find this key on your [dashboard](https://console.zendit.io/).

Fill in a .env file in the root directory of the example application, and replace YOUR_KEY_HERE with your actual API key:
```.env
ZENDIT_API_KEY=YOUR_KEY_HERE
```

### Step 3: Run the Example
Now you're all set! To run the example and see the Zendit SDK for PHP in action, execute the following command:

```bash
php example.php
```

This will run the example.php script, which demonstrates the basic usage of the Zendit SDK.

## SDK Guide

For additional documentation checkout the [SDK Guide](docs/Api/ZenditApi.md)

## Getting help

If you need assistance with installing or using the library, please refer to the [Developers site][docs-link] first.
If you cannot find the answer to your question, you can [contact support][support-page].

If you've instead found a bug in the library or would like new features added, go ahead and open issues or pull requests against this repo!

## Contributing

Bug fixes, docs, and library improvements are always welcome. Please refer to our [Contributing Guide](CONTRIBUTING.md) for detailed information on how you can contribute.

> You are welcome to suggest changes and submit PRs illustrating the changes. You can find more info about this in the [Contributing Guide](CONTRIBUTING.md).

If you're not familiar with the GitHub pull request/contribution process, [this is a nice tutorial](https://gun.io/blog/how-to-github-fork-branch-and-pull-request/).

[docs-link]: https://developers.zendit.io
[issue-link]: https://github.com/zenditplatform/zendit-php-sdk/issues/new
[github]: https://github.com/zenditplatform/zendit-php-sdk
[support-page]: https://developers.zendit.io/contact/
