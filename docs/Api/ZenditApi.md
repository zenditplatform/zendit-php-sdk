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

## Zendit\ZenditApi

All URIs are relative to /v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**balanceGet()**](ZenditApi.md#balanceGet) | **GET** /balance | Get list of transactions |
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
try {
    $result = $apiInstance->balanceGet();
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->balanceGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Zendit\Model\DtoBalanceResponse**](../Model/DtoBalanceResponse.md)

[[Back to top]](#zendit-sdk-guide) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `topupsOffersGet()`

```php
topupsOffersGet($_limit, $_offset, $brand, $country, $sub_type): \Zendit\Model\DtoTopupOffersResponse
```

Get list of topup offers

### Example

```php
$_limit = 10; 
$_offset = 0;
$brand = 'Cubacel'; // [optional]
$country = 'CU'; // [optional]
$sub_type = 'Mobile Bundle'; // [optional]

try {
    $result = $apiInstance->topupsOffersGet($_limit, $_offset, $brand, $country, $sub_type);
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsOffersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Parameter    |Type |Required | Description|Example|
--------------|-------|------------|------|------|
| **_limit**   | **int**|Yes|Number of offers to retrieve, minimum 1 and maximum 1024. Used for pagination of the catalog.|10|
| **_offset**  | **int**|Yes|Number of offers to skip, minimum 0. Used for pagination to skip items.|20|
| **brand**    | **string**|No|The Brand of carrier for the search| Cubacel|
| **country**  | **string**|No|The 2 letter ISO country code for the destination of the offer search|CU|
| **sub_type** | **string**|No|The product subtype for the offer search|Mobile Bundle|

### Return type

[**\Zendit\Model\DtoTopupOffersResponse**](../Model/DtoTopupOffersResponse.md)

[[Back to top]](#zendit-sdk-guide) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `topupsOffersOfferIdGet()`

```php
topupsOffersOfferIdGet($offer_id): \Zendit\Model\DtoTopupOffer
```

Get a topup offer by the offer ID

### Example

```php
$offer_id = 'TIGO_GT-US-PAQUETIGO-001'; // Get topup by id

try {
    $result = $apiInstance->topupsOffersOfferIdGet($offer_id);
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsOffersOfferIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters
| Name | Type | Required | Description| Example |
| ------------- | ------------- | ------------- | ------------- |---------|
| **offer_id** | **string**| Yes|Id for the offer in the catalog|TIGO_GT-US-PAQUETIGO-001|

### Return type

[**\Zendit\Model\DtoTopupOffer**](../Model/DtoTopupOffer.md)

[[Back to top]](#zendit-sdk-guide) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `topupsPurchasesGet()`

```php
topupsPurchasesGet($_limit, $_offset, $created_at): \Zendit\Model\DtoTopupPurchasesResponse
```

Get list of topup transactions

### Example

```php
$_limit = 10; 
$_offset = 0; 
$created_at = 'gte2023-03-29T00:00:00Z'; // [optional]

try {
    $result = $apiInstance->topupsPurchasesGet($_limit, $_offset, $created_at);
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsPurchasesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters
| Name | Type | Required | Description|Example|
| ------------- | ------------- | ------------- | -------------| ------------- |
| **_limit** | **int**| Yes|Number of transactions to retrieve, minimum 1 and maximum 1024. Used for pagination of the transaction list.|10| 
| **_offset** | **int**| Yes|Number of transactions to skip, minimum 0. Used for pagination to skip items.|20|
| **created_at** | **string**| No|Created date/time of transaction with search modifiers as described in the Date Formats section|gte2023-03-29T00:00:00Z|

### Return type

[**\Zendit\Model\DtoTopupPurchasesResponse**](../Model/DtoTopupPurchasesResponse.md)

[[Back to top]](#zendit-sdk-guide) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `topupsPurchasesPost()`

```php
topupsPurchasesPost($data): \Zendit\Model\DtoTopupPurchaseResponse
```

Create transaction for purchase

### Example

```php
try {
    $data = new DtoTopupPurchaseMakeInput();
    $data->setTransactionId("c8081420-b8d2-48a6-b141-edaa8d5b8bdb");
    $data->setRecipientPhoneNumber("+5355564362");
    $data->setOfferId("CUBACEL_CU_PAQUETE001");

    $result = $apiInstance->topupsPurchasesPost($data);
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsPurchasesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Parameter| Type | Required | Description|
-------|------|----------|------|
|data| [**\Zendit\Model\DtoTopupPurchaseMakeInput**](../Model/DtoTopupPurchaseMakeInput.md) | Yes      |DtoTopupPurhcaseMakeInput object containing the offerId, recipient phone number and transactionId. For RANGE offers the value and value sent type must be included. Optional information about the sender can be included|

### Return type

[**\Zendit\Model\DtoTopupPurchaseResponse**](../Model/DtoTopupPurchaseResponse.md)

[[Back to top]](#zendit-sdk-guide) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `topupsPurchasesTransactionIdGet()`

```php
topupsPurchasesTransactionIdGet($transaction_id): \Zendit\Model\DtoTopupPurchase
```

Get topup transaction by id

### Example

```php
try {
    $result = $apiInstance->topupsPurchasesTransactionIdGet("0f1db8e2-b0c9-49ac-a814-1f469e71c8a8");
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsPurchasesTransactionIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters
| Parameter     | Type |Required | Description|Example|
---------------|------|------------|------|------|
| transactionId| **string** |Yes|ID of the transaction to retrieve|0f1db8e2-b0c9-49ac-a814-1f469e71c8a8

### Return type

[**\Zendit\Model\DtoTopupPurchase**](../Model/DtoTopupPurchase.md)

[[Back to top]](#zendit-sdk-guide) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `transactionsGet()`

```php
transactionsGet($_limit, $_offset, $created_at, $product_type): \Zendit\Model\DtoTransactionsResponse
```

Get list of transactions

### Example

```php
$_limit = 10; 
$_offset = 0; 
$created_at = 'gte2023-03-29T00:00:00Z'; // [optional]
$product_type = \Zendit\Model\DtoProductType::ProductTypeTopup; // [optional]

try {
    $result = $apiInstance->transactionsGet($_limit, $_offset, $created_at, $product_type);
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->transactionsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters
| Name | Type | Required | Description|Example|
| ------------- | ------------- | ------------- | -------------| ------------- |
| **_limit** | **int**|  Yes|Number of transactions to retrieve, minimum 1 and maximum 1024. Used for pagination of the transaction list.|10|
| **_offset** | **int**| Yes|Number of transactions to skip, minimum 0. Used for pagination to skip items.|20|
| **created_at** | **string**|  No|Created date/time of transaction with search modifiers as described in the Date Formats section|gte2023-03-29T00:00:00Z|
| **product_type** | **string**| No|Product type as listed in the enum section under product types|TOPUP

### Return type

[**\Zendit\Model\DtoTransactionsResponse**](../Model/DtoTransactionsResponse.md)

[[Back to top]](#zendit-sdk-guide) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `transactionsTransactionIdGet()`

```php
transactionsTransactionIdGet($transaction_id): \Zendit\Model\DtoTransaction
```

Get transaction by id

### Example

```php
try {
    $result = $apiInstance->transactionsTransactionIdGet('0f1db8e2-b0c9-49ac-a814-1f469e71c8a8');
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->transactionsTransactionIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Parameter    | Required | Type   | Description                     | Example                                  |
|--------------|----------|--------|---------------------------------|------------------------------------------|
| transactionId| Yes      | String | ID of the transaction to retrieve | 0f1db8e2-b0c9-49ac-a814-1f469e71c8a8 |

### Return type

[**\Zendit\Model\DtoTransaction**](../Model/DtoTransaction.md)

[[Back to top]](#zendit-sdk-guide) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `vouchersOffersGet()`

```php
vouchersOffersGet($_limit, $_offset, $brand, $country, $sub_type): \Zendit\Model\DtoVoucherOffersResponse
```

Get list of voucher offers

### Example

```php
$_limit = 10;
$_offset = 0;
$brand = 'Cubacel'; // [optional]
$country = 'CU'; // [optional]
$sub_type = 'Mobile Bundle'; // [optional]

try {
    $result = $apiInstance->vouchersOffersGet($_limit, $_offset, $brand, $country, $sub_type);
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersOffersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters
| Parameter    |Type |Required | Description|Example|
--------------|-------|------------|------|------|
| **_limit**   | **int**|Yes|Number of offers to retrieve, minimum 1 and maximum 1024. Used for pagination of the catalog.|10|
| **_offset**  | **int**|Yes|Number of offers to skip, minimum 0. Used for pagination to skip items.|20|
| **brand**    | **string**|No|The Brand of carrier for the search| Cubacel|
| **country**  | **string**|No|The 2 letter ISO country code for the destination of the offer search|CU|
| **sub_type** | **string**|No|The product subtype for the offer search|Mobile Bundle|

### Return type

[**\Zendit\Model\DtoVoucherOffersResponse**](../Model/DtoVoucherOffersResponse.md)

[[Back to top]](#zendit-sdk-guide) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `vouchersOffersOfferIdGet()`

```php
vouchersOffersOfferIdGet($offer_id): \Zendit\Model\DtoVoucherOffer
```

Get a voucher offer by the offer ID

### Example

```php
try {
    $result = $apiInstance->vouchersOffersOfferIdGet("AMAZON_CA_005_EGIFT_USD");
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersOffersOfferIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

### Parameters
| Name | Type | Required | Description| Example |
| ------------- | ------------- | ------------- | ------------- |---------|
| **offer_id** | **string**| Yes|Id for the offer in the catalog|AMAZON_CA_005_EGIFT_USD|


### Return type

[**\Zendit\Model\DtoVoucherOffer**](../Model/DtoVoucherOffer.md)

[[Back to top]](#zendit-sdk-guide) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `vouchersPurchasesGet()`

```php
vouchersPurchasesGet($_limit, $_offset, $created_at): \Zendit\Model\DtoVoucherPurchasesResponse
```

Get list of transactions

### Example

```php
try {
    $_limit = 10; 
    $_offset = 0; 
    $created_at = 'gte2023-03-29T00:00:00Z'; // [optional]
    
    $result = $apiInstance->vouchersPurchasesGet($_limit, $_offset, $created_at);
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersPurchasesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters
| Name | Type | Required | Description|Example|
| ------------- | ------------- | ------------- | -------------| ------------- |
| **_limit** | **int**| Yes|Number of transactions to retrieve, minimum 1 and maximum 1024. Used for pagination of the transaction list.|10| 
| **_offset** | **int**| Yes|Number of transactions to skip, minimum 0. Used for pagination to skip items.|20|
| **created_at** | **string**| No|Created date/time of transaction with search modifiers as described in the Date Formats section|gte2023-03-29T00:00:00Z|


### Return type

[**\Zendit\Model\DtoVoucherPurchasesResponse**](../Model/DtoVoucherPurchasesResponse.md)

[[Back to top]](#zendit-sdk-guide) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `vouchersPurchasesPost()`

```php
vouchersPurchasesPost($data): \Zendit\Model\DtoVoucherPurchaseResponse
```

Create transaction for purchase

### Example

```php
$data = new \Zendit\Model\DtoVoucherPurchaseInput();
$fields = [
    new DtoVoucherField([
        "key" => "recipient.firstName",
        "value" => "John",
    ]),
    new DtoVoucherField([
        "key" => "recipient.lastName",
        "value" => "Doe",
    ]),
    new DtoVoucherField([
        "key" => "recipient.msisdn",
        "value" => "+15515551212",
    ]),
    new DtoVoucherField([
        "key" => "sender.firstName",
        "value" => "Jane",
    ]),
    new DtoVoucherField([
        "key" => "sender.lastName",
        "value" => "Doe",
    ]),
    new DtoVoucherField([
        "key" => "sender.msisdn",
        "value" => "+15515551212",
    ]),
];
$data->setFields($fields);
$data->setOfferId("AIRCANADA_CA_001_EGIFT_USD");
$data->setTransactionId("52f0e01f-6dd2-4e06-af85-c9fcbbdef4b5");

try {
    $result = $apiInstance->vouchersPurchasesPost($data);
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersPurchasesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Parameter | Required | Type | Description |
| --------- | -------- | ---- | ----------- |
| data      | Yes      | [\Zendit\Model\DtoVoucherPurchaseInput](../Model/DtoVoucherPurchaseInput.md) | DtoTopupPurhcaseMakeInput object containing the offerId, recipient phone number and transactionId. For RANGE offers the value and value sent type must be included. Optional information about the sender can be included |

### Return type

[**\Zendit\Model\DtoVoucherPurchaseResponse**](../Model/DtoVoucherPurchaseResponse.md)

[[Back to top]](#zendit-sdk-guide) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `vouchersPurchasesTransactionIdGet()`

```php
vouchersPurchasesTransactionIdGet($transaction_id): \Zendit\Model\DtoVoucherPurchase
```

Get purchase transaction by id

### Example

```php
$transaction_id = '0f1db8e2-b0c9-49ac-a814-1f469e71c8a8'; 

try {
    $result = $apiInstance->vouchersPurchasesTransactionIdGet($transaction_id);
    echo $result;
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersPurchasesTransactionIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters
| Parameter    | Required | Type   | Description                     | Example                                  |
|--------------|----------|--------|---------------------------------|------------------------------------------|
| transactionId| Yes      | String | ID of the transaction to retrieve | 0f1db8e2-b0c9-49ac-a814-1f469e71c8a8 |

### Return type

[**\Zendit\Model\DtoVoucherPurchase**](../Model/DtoVoucherPurchase.md)

[[Back to top]](#zendit-sdk-guide) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)


## ENUM Values for Requests

Zendit uses several ENUM string values for searches and responses. Refer to the following values for parameter values and their use in Zendit.

### Transaction Status

|Status |Description  |
--------|-------------|
|ACCEPTED|Transaction was accepted for processing|
|PENDING|Transaction is awaiting processing by Zendit|
|AUTHORIZED|Transaction has successfully been authorized against the Zendit Wallet|
|IN_PROGRESS|Transaction is in progress for fulfillment with the provider|
|DONE|Transaction has successfully completed|
|FAIL|The transaction has failed to be fulfilled. Check the error reason and the log within the transaction to understand which step it failed and why|

### Price Type

|Value |Description |
-------|------------|
|FIXED|Offer type uses a fixed cost, price, and value delivered|
|RANGE|Offer provides a range of value between the min and max values and cost, price, and value are based on the FX Rates for the offer|

### Product Type

|Value |Description |
-------|------------|
|TOPUP|Transaction is a Mobile Top Up, Mobile Bundle, or Mobile Data offer. Check the subtype for detail.|
|VOUCHER|Transaction is a Digital Gift Card or Utility Payment offer. Check the subtype for detail.|
|RECHARGE_SANDBOX|Transaction is a wallet recharge on the test mode environment.|
|RECHARGE_WITH_CREDIT_CARD|Transaction is a wallet recharge in the production environment using a credit card.|

### Transaction Type

|Value |Description |
-------|------------|
|CREDIT|Transaction added value to the wallet through a recharge or balance credit|
|DEBIT|Transaction subtracted value from the wallet through a product purchase or a balance adjustment|

### Value Type

Value types are used by RANGE offers allowing the value to be sent based on the price charged to the customer, the cost for the Zendit client or the value desired in the destination currency.

|Value |Description |
-------|------------|
|COST|Customer Price and Value delivered calculated using the Zendit client's cost FX|
|PRICE|Zendit client Cost and Value delivered calculated using the customer's price FX|
|ZEND|Zendit client cost and customer's price calculated using the cost FX and price FX for a specific value to be delivered in the destination currency|

## Date Formats for Transaction Searches

When using search transactions methods (topupsPurchasesGet, vouchersPurchasesGet, and transactionsGet) Zendit expects the date to be in [RFC 3339](https://www.rfc-editor.org/rfc/rfc3339) format using UTC timezone e.g. 2023-02-15T03:15:22Z)

When searching dates, there are search prefixes to use to handle how you want to search based on the createdBy date.

|Format|Description|Example|
---|---|---|
|No prefix|Search for an exact date/time|2023-02-15T03:15:22Z will search for transactions that match February 15, 2023 at 3:15 and 22 seconds in UTC timezone|
|lt|Search for a date/time that is earlier than the supplied value|lt2023-02-15T03:15:22Z will search for transactions that are before February 15, 2023 at 3:15 and 22 seconds in UTC timezone|
|lte|Search for a date/time that is equal to the supplied value and earlier|lte2023-02-15T03:15:22Z will search for transactions that are equal February 15, 2023 at 3:15 and 22 seconds in UTC timezone and transactions that are earlier|
|gt|Search for a date/time that is later than the supplied value|gt2023-02-15T03:15:22Z will search for transactions that are after February 15, 2023 at 3:15 and 22 seconds in UTC timezone|
|gte|Search for a date/time that is equal to the supplied value and later|gte2023-02-15T03:15:22Z will search for transactions that are equal to February 15, 2023 at 3:15 and 22 seconds in UTC timezone and transactions that are later|

## Handling Errors

For information on errors in Zendit, refer to the [Error Message Guide](https://developers.zendit.io/error-messages)