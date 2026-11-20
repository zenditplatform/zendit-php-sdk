# # DtoPaymentResultInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**customer_reference_id** | **string** |  | [optional]
**payment_amount** | **int** | PaymentAmount is in minor units of PaymentCurrency. The two are sent together or not at all. | [optional]
**payment_currency** | **string** |  | [optional]
**payment_reference** | **string** | PaymentReference is the reference the client returned from the Payment Request webhook. |
**payment_status** | [**\Zendit\Model\DtoPaymentStatus**](DtoPaymentStatus.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
