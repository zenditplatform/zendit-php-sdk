
# Zendit SDK Guide

The Zendit SDK provides access to the Global Prepayment Ecosystem. In this guide you'll find examples and explanations on how to use the Zendit SDK to get started and integrate it into your application.

For support with this SDK, please contact [support@zendit.io](mailto:support@zendit.io)

## About the Sample Code

In this guide you will find references to Zendit products and how to create a transaction. Phone numbers in this guide are usable for testing the SDK in your test mode environment. Throughout the examples UUIDs are used for transaction numbers. IDs are supplied by the user for tracking and may be any alphanumeric value that is unique to each transaction per environment. For example, a client using a table with an autonumber field with a development instance and a production instance may send the autonumber generated as the transaction Id. The same Id may be sent to test mode and production to allow testing of an integration to not interfere with production transactions.

## Minor Currency Values

Zendit uses minor currency for values in the catalog and transactions. For USD the value of 200 (cents) would be $2.00 in major currency.

## About catalog offers

In the Zendit Console you may enable or disable products for resale in your client account. The catalog search methods will retrieve all products in the catalog. All catalog items are marked with the status of whether they are enabled. Items that are disabled should be removed from product listings that are made available for customer purchases. If an offer is disabled, an attempt to purchase the offer will fail.

## Getting a Client Instance

To access Zendit, you need to create a client instance and use your API Client Secret. You can find your secret in the Zendit Client Console on the API Settings page.

To setup your client:
```php
<?php

use Zendit\ZenditAPI;

$apiInstance = new ZenditAPI('YOUR_API_KEY');
```
You may configure loading of your client secret in a config file for your application. Test mode environments and production environments use different tokens for your client account.

# Zendit\ZenditApi

All URIs are relative to /v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**balanceGet()**](ZenditApi.md#balanceGet) | **GET** /balance | Get list of transactions |
| [**esimIccIdPlansGet()**](ZenditApi.md#esimIccIdPlansGet) | **GET** /esim/{iccId}/plans | Get list of eSim plans |
| [**esimOffersGet()**](ZenditApi.md#esimOffersGet) | **GET** /esim/offers | Get list of eSIM offers |
| [**esimOffersOfferIdGet()**](ZenditApi.md#esimOffersOfferIdGet) | **GET** /esim/offers/{offerId} | Get an eSIM offer by the offer ID |
| [**esimPurchasesGet()**](ZenditApi.md#esimPurchasesGet) | **GET** /esim/purchases | Get list of eSim transactions |
| [**esimPurchasesPost()**](ZenditApi.md#esimPurchasesPost) | **POST** /esim/purchases | Create transaction for purchase |
| [**esimPurchasesTransactionIdGet()**](ZenditApi.md#esimPurchasesTransactionIdGet) | **GET** /esim/purchases/{transactionId} | Get eSim transaction by id |
| [**esimPurchasesTransactionIdQrcodeGet()**](ZenditApi.md#esimPurchasesTransactionIdQrcodeGet) | **GET** /esim/purchases/{transactionId}/qrcode | Get eSim QR code by transaction id |
| [**reportsTransactionsPost()**](ZenditApi.md#reportsTransactionsPost) | **POST** /reports/transactions | Requests transactions reports |
| [**reportsTransactionsReportIdFileGet()**](ZenditApi.md#reportsTransactionsReportIdFileGet) | **GET** /reports/transactions/{reportId}/{file} | Download report file |
| [**reportsTransactionsReportIdGet()**](ZenditApi.md#reportsTransactionsReportIdGet) | **GET** /reports/transactions/{reportId} | Get transactions report by ID |
| [**toolsPhonenumberlookupMsisdnGet()**](ZenditApi.md#toolsPhonenumberlookupMsisdnGet) | **GET** /tools/phonenumberlookup/{msisdn} | Get phone number info |
| [**topupsOffersGet()**](ZenditApi.md#topupsOffersGet) | **GET** /topups/offers | Get list of topup offers |
| [**topupsOffersOfferIdGet()**](ZenditApi.md#topupsOffersOfferIdGet) | **GET** /topups/offers/{offerId} | Get a topup offer by the offer ID |
| [**topupsPurchasesGet()**](ZenditApi.md#topupsPurchasesGet) | **GET** /topups/purchases | Get list of topup transactions |
| [**topupsPurchasesPost()**](ZenditApi.md#topupsPurchasesPost) | **POST** /topups/purchases | Create transaction for purchase |
| [**topupsPurchasesTransactionIdGet()**](ZenditApi.md#topupsPurchasesTransactionIdGet) | **GET** /topups/purchases/{transactionId} | Get topup transaction by id |
| [**transactionsGet()**](ZenditApi.md#transactionsGet) | **GET** /transactions | Get list of transactions |
| [**transactionsTransactionIdGet()**](ZenditApi.md#transactionsTransactionIdGet) | **GET** /transactions/{transactionId} | Get transaction by id |
| [**vouchersOffersGet()**](ZenditApi.md#vouchersOffersGet) | **GET** /vouchers/offers | Get list of voucher offers |
| [**vouchersOffersOfferIdGet()**](ZenditApi.md#vouchersOffersOfferIdGet) | **GET** /vouchers/offers/{offerId} | Get a voucher offer by the offer ID |
| [**vouchersPurchasesGet()**](ZenditApi.md#vouchersPurchasesGet) | **GET** /vouchers/purchases | Get list of transactions |
| [**vouchersPurchasesPost()**](ZenditApi.md#vouchersPurchasesPost) | **POST** /vouchers/purchases | Create transaction for purchase |
| [**vouchersPurchasesTransactionIdGet()**](ZenditApi.md#vouchersPurchasesTransactionIdGet) | **GET** /vouchers/purchases/{transactionId} | Get purchase transaction by id |


## `balanceGet()`

```php
balanceGet(): \Zendit\Model\DtoBalanceResponse
```

Get list of transactions

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$icc_id = 'icc_id_example'; // string | eSIM Plans input data

try {
    $result = $apiInstance->esimIccIdPlansGet($icc_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditApi->esimIccIdPlansGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **icc_id** | **string**| eSIM Plans input data | |

### Return type

[**\Zendit\Model\DtoESIMPlansResponse**](../Model/DtoESIMPlansResponse.md)

[[Back to top]](#zendit-sdk-guide) 
[[Back to README]](../../README.md)

## `esimOffersGet()`

```php
esimOffersGet($_limit, $_offset, $brand, $country, $regions, $sub_type): \Zendit\Model\DtoESimOffersResponse
```

Get list of eSIM offers

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$offer_id = 'offer_id_example'; // string | Get an eSIM by id

try {
    $result = $apiInstance->esimOffersOfferIdGet($offer_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditApi->esimOffersOfferIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offer_id** | **string**| Get an eSIM by id | |

### Return type

[**\Zendit\Model\DtoESimOffer**](../Model/DtoESimOffer.md)

[[Back to top]](#zendit-sdk-guide) 
[[Back to README]](../../README.md)

## `esimPurchasesGet()`

```php
esimPurchasesGet($_limit, $_offset, $created_at, $status): \Zendit\Model\DtoESimPurchasesResponse
```

Get list of eSim transactions

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$data = new \Zendit\Model\DtoESimPurchaseMakeInput(); // \Zendit\Model\DtoESimPurchaseMakeInput | Purchase input data

try {
    $result = $apiInstance->esimPurchasesPost($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditApi->esimPurchasesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **data** | [**\Zendit\Model\DtoESimPurchaseMakeInput**](../Model/DtoESimPurchaseMakeInput.md)| Purchase input data | |

### Return type

[**\Zendit\Model\DtoESimPurchaseResponse**](../Model/DtoESimPurchaseResponse.md)

[[Back to top]](#zendit-sdk-guide) 
[[Back to README]](../../README.md)

## `esimPurchasesTransactionIdGet()`

```php
esimPurchasesTransactionIdGet($transaction_id): \Zendit\Model\DtoESimPurchase
```

Get eSim transaction by id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$transaction_id = 'transaction_id_example'; // string | transaction id

try {
    $result = $apiInstance->esimPurchasesTransactionIdQrcodeGet($transaction_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditApi->esimPurchasesTransactionIdQrcodeGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **transaction_id** | **string**| transaction id | |

### Return type

**\SplFileObject**

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `image/png`, `application/json`

[[Back to top]](#zendit-sdk-guide) 
[[Back to README]](../../README.md)

## `reportsTransactionsPost()`

```php
reportsTransactionsPost($data): \Zendit\Model\DtoReportTransactions
```

Requests transactions reports

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$report_id = 'report_id_example'; // string | Report ID
$file = 'file_example'; // string | File

try {
    $result = $apiInstance->reportsTransactionsReportIdFileGet($report_id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditApi->reportsTransactionsReportIdFileGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **report_id** | **string**| Report ID | |
| **file** | **string**| File | |

### Return type

**\SplFileObject**

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/octet-stream`

[[Back to top]](#zendit-sdk-guide) 
[[Back to README]](../../README.md)

## `reportsTransactionsReportIdGet()`

```php
reportsTransactionsReportIdGet($report_id): \Zendit\Model\DtoReportTransactions
```

Get transactions report by ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$msisdn = 'msisdn_example'; // string | Phone number

try {
    $result = $apiInstance->toolsPhonenumberlookupMsisdnGet($msisdn);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditApi->toolsPhonenumberlookupMsisdnGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **msisdn** | **string**| Phone number | |

### Return type

[**\Zendit\Model\DtoPhoneNumberLookupResponse**](../Model/DtoPhoneNumberLookupResponse.md)

[[Back to top]](#zendit-sdk-guide) 
[[Back to README]](../../README.md)

## `topupsOffersGet()`

```php
topupsOffersGet($_limit, $_offset, $brand, $country, $regions, $sub_type): \Zendit\Model\DtoTopupOffersResponse
```

Get list of topup offers

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$offer_id = 'offer_id_example'; // string | Get topup by id

try {
    $result = $apiInstance->topupsOffersOfferIdGet($offer_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditApi->topupsOffersOfferIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offer_id** | **string**| Get topup by id | |

### Return type

[**\Zendit\Model\DtoTopupOffer**](../Model/DtoTopupOffer.md)

[[Back to top]](#zendit-sdk-guide) 
[[Back to README]](../../README.md)

## `topupsPurchasesGet()`

```php
topupsPurchasesGet($_limit, $_offset, $created_at, $status): \Zendit\Model\DtoTopupPurchasesResponse
```

Get list of topup transactions

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$data = new \Zendit\Model\DtoTopupPurchaseMakeInput(); // \Zendit\Model\DtoTopupPurchaseMakeInput | Purchase input data

try {
    $result = $apiInstance->topupsPurchasesPost($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditApi->topupsPurchasesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **data** | [**\Zendit\Model\DtoTopupPurchaseMakeInput**](../Model/DtoTopupPurchaseMakeInput.md)| Purchase input data | |

### Return type

[**\Zendit\Model\DtoTopupPurchaseResponse**](../Model/DtoTopupPurchaseResponse.md)

[[Back to top]](#zendit-sdk-guide) 
[[Back to README]](../../README.md)

## `topupsPurchasesTransactionIdGet()`

```php
topupsPurchasesTransactionIdGet($transaction_id): \Zendit\Model\DtoTopupPurchase
```

Get topup transaction by id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$_limit = 56; // int
$_offset = 56; // int
$created_at = 'created_at_example'; // string
$product_type = 'product_type_example'; // string
$status = 'status_example'; // string
$type = 'type_example'; // string

try {
    $result = $apiInstance->transactionsGet($_limit, $_offset, $created_at, $product_type, $status, $type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditApi->transactionsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **_limit** | **int**|  | |
| **_offset** | **int**|  | |
| **created_at** | **string**|  | [optional] |
| **product_type** | **string**|  | [optional] |
| **status** | **string**|  | [optional] |
| **type** | **string**|  | [optional] |

### Return type

[**\Zendit\Model\DtoTransactionsResponse**](../Model/DtoTransactionsResponse.md)

[[Back to top]](#zendit-sdk-guide) 
[[Back to README]](../../README.md)

## `transactionsTransactionIdGet()`

```php
transactionsTransactionIdGet($transaction_id): \Zendit\Model\DtoTransaction
```

Get transaction by id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$_limit = 56; // int
$_offset = 56; // int
$brand = 'brand_example'; // string
$country = 'country_example'; // string
$regions = 'regions_example'; // string
$sub_type = 'sub_type_example'; // string

try {
    $result = $apiInstance->vouchersOffersGet($_limit, $_offset, $brand, $country, $regions, $sub_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditApi->vouchersOffersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **_limit** | **int**|  | |
| **_offset** | **int**|  | |
| **brand** | **string**|  | [optional] |
| **country** | **string**|  | [optional] |
| **regions** | **string**|  | [optional] |
| **sub_type** | **string**|  | [optional] |

### Return type

[**\Zendit\Model\DtoVoucherOffersResponse**](../Model/DtoVoucherOffersResponse.md)

[[Back to top]](#zendit-sdk-guide) 
[[Back to README]](../../README.md)

## `vouchersOffersOfferIdGet()`

```php
vouchersOffersOfferIdGet($offer_id): \Zendit\Model\DtoVoucherOffer
```

Get a voucher offer by the offer ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$_limit = 56; // int
$_offset = 56; // int
$created_at = 'created_at_example'; // string
$status = 'status_example'; // string

try {
    $result = $apiInstance->vouchersPurchasesGet($_limit, $_offset, $created_at, $status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditApi->vouchersPurchasesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **_limit** | **int**|  | |
| **_offset** | **int**|  | |
| **created_at** | **string**|  | [optional] |
| **status** | **string**|  | [optional] |

### Return type

[**\Zendit\Model\DtoVoucherPurchasesResponse**](../Model/DtoVoucherPurchasesResponse.md)

[[Back to top]](#zendit-sdk-guide) 
[[Back to README]](../../README.md)

## `vouchersPurchasesPost()`

```php
vouchersPurchasesPost($data): \Zendit\Model\DtoVoucherPurchaseResponse
```

Create transaction for purchase

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$transaction_id = 'transaction_id_example'; // string | transaction id

try {
    $result = $apiInstance->vouchersPurchasesTransactionIdGet($transaction_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditApi->vouchersPurchasesTransactionIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **transaction_id** | **string**| transaction id | |

### Return type

[**\Zendit\Model\DtoVoucherPurchase**](../Model/DtoVoucherPurchase.md)

[[Back to top]](#zendit-sdk-guide) 
[[Back to README]](../../README.md)
