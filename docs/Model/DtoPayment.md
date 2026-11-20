# # DtoPayment

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **int** | Amount, Currency and CurrencyDivisor are what the customer paid, once the payment succeeded. They are present together or not at all. | [optional]
**currency** | **string** |  | [optional]
**currency_divisor** | **int** |  | [optional]
**customer_email_address** | **string** | CustomerEmailAddress is your customer&#39;s email address: the one they entered in the widget when you collect customer details, or the one on file for a registered customer. | [optional]
**customer_reference_id** | **string** | CustomerReferenceID is your reference for the customer, when your payment processor reported one. | [optional]
**reference** | **string** | Reference identifies the payment with the payment provider that took it. For a payment taken by your own payment processor, it is the payment reference you returned from the Payment Request webhook. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
