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
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/zenditplatform/zendit-php-sdk.git"
    }
  ],
  "require": {
    "zenditplatform/zendit-php-sdk": "*@dev"
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

## API Endpoints

All URIs are relative to */v1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ZenditApi* | [**balanceGet**](docs/Api/ZenditApi.md#balanceget) | **GET** /balance | Get list of transactions
*ZenditApi* | [**topupsOffersGet**](docs/Api/ZenditApi.md#topupsoffersget) | **GET** /topups/offers | Get list of topup offers
*ZenditApi* | [**topupsOffersOfferIdGet**](docs/Api/ZenditApi.md#topupsoffersofferidget) | **GET** /topups/offers/{offerId} | Get a topup offer by the offer ID
*ZenditApi* | [**topupsPurchasesGet**](docs/Api/ZenditApi.md#topupspurchasesget) | **GET** /topups/purchases | Get list of topup transactions
*ZenditApi* | [**topupsPurchasesPost**](docs/Api/ZenditApi.md#topupspurchasespost) | **POST** /topups/purchases | Create transaction for purchase
*ZenditApi* | [**topupsPurchasesTransactionIdGet**](docs/Api/ZenditApi.md#topupspurchasestransactionidget) | **GET** /topups/purchases/{transactionId} | Get topup transaction by id
*ZenditApi* | [**transactionsGet**](docs/Api/ZenditApi.md#transactionsget) | **GET** /transactions | Get list of transactions
*ZenditApi* | [**transactionsTransactionIdGet**](docs/Api/ZenditApi.md#transactionstransactionidget) | **GET** /transactions/{transactionId} | Get transaction by id
*ZenditApi* | [**vouchersOffersGet**](docs/Api/ZenditApi.md#vouchersoffersget) | **GET** /vouchers/offers | Get list of voucher offers
*ZenditApi* | [**vouchersOffersOfferIdGet**](docs/Api/ZenditApi.md#vouchersoffersofferidget) | **GET** /vouchers/offers/{offerId} | Get a voucher offer by the offer ID
*ZenditApi* | [**vouchersPurchasesGet**](docs/Api/ZenditApi.md#voucherspurchasesget) | **GET** /vouchers/purchases | Get list of transactions
*ZenditApi* | [**vouchersPurchasesPost**](docs/Api/ZenditApi.md#voucherspurchasespost) | **POST** /vouchers/purchases | Create transaction for purchase
*ZenditApi* | [**vouchersPurchasesTransactionIdGet**](docs/Api/ZenditApi.md#voucherspurchasestransactionidget) | **GET** /vouchers/purchases/{transactionId} | Get purchase transaction by id

## Models

- [CoreErrorCode](docs/Model/CoreErrorCode.md)
- [CoreHTTPResponseZenditError](docs/Model/CoreHTTPResponseZenditError.md)
- [DtoBalanceResponse](docs/Model/DtoBalanceResponse.md)
- [DtoCost](docs/Model/DtoCost.md)
- [DtoError](docs/Model/DtoError.md)
- [DtoPrice](docs/Model/DtoPrice.md)
- [DtoPriceType](docs/Model/DtoPriceType.md)
- [DtoProductType](docs/Model/DtoProductType.md)
- [DtoPurchaseValue](docs/Model/DtoPurchaseValue.md)
- [DtoTopupOffer](docs/Model/DtoTopupOffer.md)
- [DtoTopupOffersResponse](docs/Model/DtoTopupOffersResponse.md)
- [DtoTopupPurchase](docs/Model/DtoTopupPurchase.md)
- [DtoTopupPurchaseMakeInput](docs/Model/DtoTopupPurchaseMakeInput.md)
- [DtoTopupPurchaseResponse](docs/Model/DtoTopupPurchaseResponse.md)
- [DtoTopupPurchasesResponse](docs/Model/DtoTopupPurchasesResponse.md)
- [DtoTopupSender](docs/Model/DtoTopupSender.md)
- [DtoTransaction](docs/Model/DtoTransaction.md)
- [DtoTransactionLogItem](docs/Model/DtoTransactionLogItem.md)
- [DtoTransactionStatus](docs/Model/DtoTransactionStatus.md)
- [DtoTransactionType](docs/Model/DtoTransactionType.md)
- [DtoTransactionsResponse](docs/Model/DtoTransactionsResponse.md)
- [DtoValueType](docs/Model/DtoValueType.md)
- [DtoVoucherField](docs/Model/DtoVoucherField.md)
- [DtoVoucherOffer](docs/Model/DtoVoucherOffer.md)
- [DtoVoucherOffersResponse](docs/Model/DtoVoucherOffersResponse.md)
- [DtoVoucherPurchase](docs/Model/DtoVoucherPurchase.md)
- [DtoVoucherPurchaseInput](docs/Model/DtoVoucherPurchaseInput.md)
- [DtoVoucherPurchaseResponse](docs/Model/DtoVoucherPurchaseResponse.md)
- [DtoVoucherPurchasesResponse](docs/Model/DtoVoucherPurchasesResponse.md)
- [DtoVoucherReceipt](docs/Model/DtoVoucherReceipt.md)
- [DtoZend](docs/Model/DtoZend.md)

## Authorization

### ApiKey

- **Type**: API key
- **API key parameter name**: Authorization
- **Location**: HTTP header


## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

