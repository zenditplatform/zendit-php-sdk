# Zendit\ZenditApi

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

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Zendit\Model\DtoBalanceResponse**](../Model/DtoBalanceResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `topupsOffersGet()`

```php
topupsOffersGet($_limit, $_offset, $brand, $country, $sub_type): \Zendit\Model\DtoTopupOffersResponse
```

Get list of topup offers

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_API_KEY');

$_limit = 56; // int
$_offset = 56; // int
$brand = 'brand_example'; // string
$country = 'country_example'; // string
$sub_type = 'sub_type_example'; // string

try {
    $result = $apiInstance->topupsOffersGet($_limit, $_offset, $brand, $country, $sub_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsOffersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **_limit** | **int**|  | |
| **_offset** | **int**|  | |
| **brand** | **string**|  | [optional] |
| **country** | **string**|  | [optional] |
| **sub_type** | **string**|  | [optional] |

### Return type

[**\Zendit\Model\DtoTopupOffersResponse**](../Model/DtoTopupOffersResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `topupsOffersOfferIdGet()`

```php
topupsOffersOfferIdGet($offer_id): \Zendit\Model\DtoTopupOffer
```

Get a topup offer by the offer ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_API_KEY');

$offer_id = 'offer_id_example'; // string | Get topup by id

try {
    $result = $apiInstance->topupsOffersOfferIdGet($offer_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsOffersOfferIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offer_id** | **string**| Get topup by id | |

### Return type

[**\Zendit\Model\DtoTopupOffer**](../Model/DtoTopupOffer.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `topupsPurchasesGet()`

```php
topupsPurchasesGet($_limit, $_offset, $created_at): \Zendit\Model\DtoTopupPurchasesResponse
```

Get list of topup transactions

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_API_KEY');

$_limit = 56; // int
$_offset = 56; // int
$created_at = 'created_at_example'; // string

try {
    $result = $apiInstance->topupsPurchasesGet($_limit, $_offset, $created_at);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsPurchasesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **_limit** | **int**|  | |
| **_offset** | **int**|  | |
| **created_at** | **string**|  | [optional] |

### Return type

[**\Zendit\Model\DtoTopupPurchasesResponse**](../Model/DtoTopupPurchasesResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `topupsPurchasesPost()`

```php
topupsPurchasesPost($data): \Zendit\Model\DtoTopupPurchaseResponse
```

Create transaction for purchase

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_API_KEY');

$data = new \Zendit\Model\DtoTopupPurchaseMakeInput(); // \Zendit\Model\DtoTopupPurchaseMakeInput | Purchase input data

try {
    $result = $apiInstance->topupsPurchasesPost($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsPurchasesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **data** | [**\Zendit\Model\DtoTopupPurchaseMakeInput**](../Model/DtoTopupPurchaseMakeInput.md)| Purchase input data | |

### Return type

[**\Zendit\Model\DtoTopupPurchaseResponse**](../Model/DtoTopupPurchaseResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
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

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_API_KEY');

$transaction_id = 'transaction_id_example'; // string | transaction id

try {
    $result = $apiInstance->topupsPurchasesTransactionIdGet($transaction_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsPurchasesTransactionIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **transaction_id** | **string**| transaction id | |

### Return type

[**\Zendit\Model\DtoTopupPurchase**](../Model/DtoTopupPurchase.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `transactionsGet()`

```php
transactionsGet($_limit, $_offset, $created_at, $product_type): \Zendit\Model\DtoTransactionsResponse
```

Get list of transactions

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_API_KEY');

$_limit = 56; // int
$_offset = 56; // int
$created_at = 'created_at_example'; // string
$product_type = 'product_type_example'; // string

try {
    $result = $apiInstance->transactionsGet($_limit, $_offset, $created_at, $product_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->transactionsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **_limit** | **int**|  | |
| **_offset** | **int**|  | |
| **created_at** | **string**|  | [optional] |
| **product_type** | **string**|  | [optional] |

### Return type

[**\Zendit\Model\DtoTransactionsResponse**](../Model/DtoTransactionsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
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

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_API_KEY');

$transaction_id = 'transaction_id_example'; // string | transaction id

try {
    $result = $apiInstance->transactionsTransactionIdGet($transaction_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->transactionsTransactionIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **transaction_id** | **string**| transaction id | |

### Return type

[**\Zendit\Model\DtoTransaction**](../Model/DtoTransaction.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `vouchersOffersGet()`

```php
vouchersOffersGet($_limit, $_offset, $brand, $country, $sub_type): \Zendit\Model\DtoVoucherOffersResponse
```

Get list of voucher offers

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_API_KEY');

$_limit = 56; // int
$_offset = 56; // int
$brand = 'brand_example'; // string
$country = 'country_example'; // string
$sub_type = 'sub_type_example'; // string

try {
    $result = $apiInstance->vouchersOffersGet($_limit, $_offset, $brand, $country, $sub_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersOffersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **_limit** | **int**|  | |
| **_offset** | **int**|  | |
| **brand** | **string**|  | [optional] |
| **country** | **string**|  | [optional] |
| **sub_type** | **string**|  | [optional] |

### Return type

[**\Zendit\Model\DtoVoucherOffersResponse**](../Model/DtoVoucherOffersResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
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

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_API_KEY');

$offer_id = 'offer_id_example'; // string | Get voucher by id

try {
    $result = $apiInstance->vouchersOffersOfferIdGet($offer_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersOffersOfferIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offer_id** | **string**| Get voucher by id | |

### Return type

[**\Zendit\Model\DtoVoucherOffer**](../Model/DtoVoucherOffer.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `vouchersPurchasesGet()`

```php
vouchersPurchasesGet($_limit, $_offset, $created_at): \Zendit\Model\DtoVoucherPurchasesResponse
```

Get list of transactions

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_API_KEY');

$_limit = 56; // int
$_offset = 56; // int
$created_at = 'created_at_example'; // string

try {
    $result = $apiInstance->vouchersPurchasesGet($_limit, $_offset, $created_at);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersPurchasesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **_limit** | **int**|  | |
| **_offset** | **int**|  | |
| **created_at** | **string**|  | [optional] |

### Return type

[**\Zendit\Model\DtoVoucherPurchasesResponse**](../Model/DtoVoucherPurchasesResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
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

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_API_KEY');

$data = new \Zendit\Model\DtoVoucherPurchaseInput(); // \Zendit\Model\DtoVoucherPurchaseInput | Purchase input data

try {
    $result = $apiInstance->vouchersPurchasesPost($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersPurchasesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **data** | [**\Zendit\Model\DtoVoucherPurchaseInput**](../Model/DtoVoucherPurchaseInput.md)| Purchase input data | |

### Return type

[**\Zendit\Model\DtoVoucherPurchaseResponse**](../Model/DtoVoucherPurchaseResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `vouchersPurchasesTransactionIdGet()`

```php
vouchersPurchasesTransactionIdGet($transaction_id): \Zendit\Model\DtoVoucherPurchase
```

Get purchase transaction by id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_API_KEY');

$transaction_id = 'transaction_id_example'; // string | transaction id

try {
    $result = $apiInstance->vouchersPurchasesTransactionIdGet($transaction_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersPurchasesTransactionIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **transaction_id** | **string**| transaction id | |

### Return type

[**\Zendit\Model\DtoVoucherPurchase**](../Model/DtoVoucherPurchase.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
