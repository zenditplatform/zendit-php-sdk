<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Zendit\Model\DtoTopupPurchaseMakeInput;
use Zendit\Model\DtoVoucherField;
use Zendit\Model\DtoVoucherPurchaseInput;
use Zendit\ZenditAPI;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$apiKey = $_SERVER['ZENDIT_API_KEY'];

$zendit = new ZenditAPI($apiKey);

//
// balanceGet()
//

try {
    $result = $zendit->balanceGet();

    // Do some work there
    $result->getCurrency();
    $result->getAvailableBalance();

    // JSON
    echo "_________ balanceGet() _________\r\n";
    echo $result . "\r\n";
    echo "______ end of balanceGet() _________\r\n\r\n";
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->balanceGet: ', $e->getMessage(), PHP_EOL;
}

//
// topupsOffersGet()
//

try {
    $limit = 1;
    $offset = 0;

    $result = $zendit->topupsOffersGet($limit, $offset);

    // Do some work there
    foreach ($result->getList() as $value) {
        $value->getOfferId();
        $value->getOfferId();
        $value->getBrand();
        $value->getCost();
        $value->getCountry();
        $value->getCreatedAt();
        $value->getEnabled();
        $value->getNotes();
        $value->getPrice();
        $value->getPriceType();
        $value->getProductType();
        $value->getSend();
        $value->getShortNotes();
        join(", ", $value->getSubTypes());
        $value->getUpdatedAt();
    }

    // JSON
    echo "_________ topupsOffersGet() _________\r\n";
    echo $result . "\r\n";
    echo "______ end of topupsOffersGet() _________\r\n\r\n";
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsOffersGet: ', $e->getMessage(), PHP_EOL;
}

//
// topupsOffersOfferIdGet()
//

try {
    $offerId = 'CUBACEL_CU_OPEN';
    $result = $zendit->topupsOffersOfferIdGet($offerId);

    // Do some work here
    $result->getBrand();
    $result->getCost();
    $result->getCountry();
    $result->getCreatedAt();
    $result->getEnabled();
    $result->getNotes();
    $result->getOfferId();
    $result->getPrice();
    $result->getPriceType();
    $result->getProductType();
    $result->getSend();
    $result->getShortNotes();
    $result->getSubTypes();
    $result->getUpdatedAt();

    // JSON
    echo "_________ topupsOffersOfferIdGet() _________\r\n";
    echo $result . "\r\n";
    echo "______ end of topupsOffersOfferIdGet() _________\r\n\r\n";
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsOffersOfferIdGet: ', $e->getMessage(), PHP_EOL;
}


//
// topupsPurchasesGet()
//

try {
    $limit = 1;
    $offset = 0;

    $result = $zendit->topupsPurchasesGet($limit, $offset);

    // Do some work here
    foreach ($result->getList() as $value) {
        $value->getBrand();
        $value->getCost();
        $value->getCostCurrency();
        $value->getCountry();
        $value->getCreatedAt();
        $value->getError();
        $value->getLog();
        $value->getNotes();
        $value->getOfferId();
        $value->getPrice();
        $value->getPriceCurrency();
        $value->getPriceType();
        $value->getProductType();
        $value->getRecipientPhoneNumber();
        $value->getSend();
        $value->getSendCurrency();
        $value->getSender();
        $value->getShortNotes();
        $value->getStatus();
        $value->getSubTypes();
        $value->getTransactionId();
        $value->getUpdatedAt();
        $value->getValue();
    }

    // JSON
    echo "_________ topupsPurchasesGet() _________\r\n";
    echo $result . "\r\n";
    echo "______ end of topupsPurchasesGet() _________\r\n\r\n";
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsPurchasesGet: ', $e->getMessage(), PHP_EOL;
}

//
// topupsPurchasesPost()
//

try {
    $data = new DtoTopupPurchaseMakeInput();
    $data->setTransactionId(preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(random_bytes(14))));
    $data->setRecipientPhoneNumber("+5355564362");
    $data->setOfferId("CUBACEL_CU_PAQUETE001");

    $result = $zendit->topupsPurchasesPost($data);

    // Do some work here
    $result->getStatus();
    $result->getTransactionId();

    // JSON
    echo "_________ topupsPurchasesPost() _________\r\n";
    echo $result . "\r\n";
    echo "______ end of topupsPurchasesPost() _________\r\n\r\n";
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsPurchasesPost: ', $e->getMessage(), PHP_EOL;
}

//
// topupsPurchasesTransactionIdGet()
//

try {
    $data = new DtoTopupPurchaseMakeInput();
    $data->setTransactionId(preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(random_bytes(14))));
    $data->setRecipientPhoneNumber("+5355564362");
    $data->setOfferId("CUBACEL_CU_PAQUETE001");
    $purchaseData = $zendit->topupsPurchasesPost($data);

    $result = $zendit->topupsPurchasesTransactionIdGet($purchaseData->getTransactionId());

    // Do some work here
    $result->getBrand();
    $result->getCost();
    $result->getCostCurrency();
    $result->getCountry();
    $result->getCreatedAt();
    $result->getError();
    $result->getLog();
    $result->getNotes();
    $result->getOfferId();
    $result->getPrice();
    $result->getPriceCurrency();
    $result->getPriceType();
    $result->getProductType();
    $result->getRecipientPhoneNumber();
    $result->getSend();
    $result->getSendCurrency();
    $result->getSender();
    $result->getShortNotes();
    $result->getStatus();
    $result->getSubTypes();
    $result->getTransactionId();
    $result->getUpdatedAt();
    $result->getValue();

    // JSON
    echo "_________ topupsPurchasesTransactionIdGet() _________\r\n";
    echo $result . "\r\n";
    echo "______ end of topupsPurchasesTransactionIdGet() _________\r\n\r\n";
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->topupsPurchasesTransactionIdGet: ', $e->getMessage(), PHP_EOL;
}

//
// transactionsGet()
//

try {
    $limit = 1;
    $offset = 0;

    $result = $zendit->transactionsGet($limit, $offset);

    // Do some work here
    foreach ($result->getList() as $value) {
        $value->getTransactionId();
        $value->getAmount();
        $value->getLog();
        $value->getError();
        $value->getCurrency();
        $value->getStatus();
        $value->getProductType();
        $value->getType();
        $value->getCreatedAt();
        $value->getUpdatedAt();
    }

    // JSON
    echo "_________ transactionsGet() _________\r\n";
    echo $result . "\r\n";
    echo "______ end of transactionsGet() _________\r\n\r\n";
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->transactionsGet: ', $e->getMessage(), PHP_EOL;
}

//
// transactionsTransactionIdGet()
//

try {
    $transactionId = $zendit->transactionsGet(1, 0)->getList()[0]->getTransactionId();

    $result = $zendit->transactionsTransactionIdGet($transactionId);

    // Do some work here
    $result->getTransactionId();
    $result->getAmount();
    $result->getLog();
    $result->getError();
    $result->getCurrency();
    $result->getStatus();
    $result->getProductType();
    $result->getType();
    $result->getCreatedAt();
    $result->getUpdatedAt();

    // JSON
    echo "_________ transactionsTransactionIdGet() _________\r\n";
    echo $result . "\r\n";
    echo "______ end of transactionsTransactionIdGet() _________\r\n\r\n";
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->transactionsTransactionIdGet: ', $e->getMessage(), PHP_EOL;
}

//
// vouchersOffersGet()
//

try {
    $limit = 1;
    $offset = 0;

    $result = $zendit->vouchersOffersGet($limit, $offset);

    // Do some work here
    foreach ($result->getList()as $value) {
        $value->getOfferId();
        $value->getBrand();
        $value->getCost();
        $value->getCountry();
        $value->getCreatedAt();
        $value->getEnabled();
        $value->getNotes();
        $value->getPrice();
        $value->getPriceType();
        $value->getProductType();
        $value->getSend();
        $value->getShortNotes();
        join(", ", $value->getSubTypes());
        $value->getUpdatedAt();
    }

    // JSON
    echo "_________ vouchersOffersGet() _________\r\n";
    echo $result . "\r\n";
    echo "______ end of vouchersOffersGet() _________\r\n\r\n";
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersOffersGet: ', $e->getMessage(), PHP_EOL;
}

//
// vouchersOffersOfferIdGet()
//

try {
    $offerId = $zendit->vouchersOffersGet(1, 0)->getList()[0]->getOfferId();

    $result = $zendit->vouchersOffersOfferIdGet($offerId);

    // Do some work here
    $result->getOfferId();
    $result->getBrand();
    $result->getCost();
    $result->getCountry();
    $result->getCreatedAt();
    $result->getEnabled();
    $result->getNotes();
    $result->getPrice();
    $result->getPriceType();
    $result->getProductType();
    $result->getSend();
    $result->getShortNotes();
    join(", ", $result->getSubTypes());
    $result->getUpdatedAt();

    // JSON
    echo "_________ vouchersOffersOfferIdGet() _________\r\n";
    echo $result . "\r\n";
    echo "______ end of vouchersOffersOfferIdGet() _________\r\n\r\n";
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersOffersOfferIdGet: ', $e->getMessage(), PHP_EOL;
}

//
// vouchersPurchasesGet()
//

try {
    $limit = 1;
    $offset = 0;

    $result = $zendit->vouchersPurchasesGet($limit, $offset);

    // Do some work here
    foreach ($result->getList() as $value) {
        $value->getBrand();
        $value->getCost();
        $value->getCostCurrency();
        $value->getCountry();
        $value->getCreatedAt();
        $value->getError();
        $value->getFields();
        $value->getLog();
        $value->getNotes();
        $value->getOfferId();
        $value->getPrice();
        $value->getPriceCurrency();
        $value->getPriceType();
        $value->getProductType();
        $value->getReceipt();
        $value->getSend();
        $value->getSendCurrency();
        $value->getShortNotes();
        $value->getStatus();
        $value->getSubTypes();
        $value->getTransactionId();
        $value->getUpdatedAt();
        $value->getValue();
    }

    // JSON
    echo "_________ vouchersPurchasesGet() _________\r\n";
    echo $result . "\r\n";
    echo "______ end of vouchersPurchasesGet() _________\r\n\r\n";
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersPurchasesGet: ', $e->getMessage(), PHP_EOL;
}

//
// vouchersPurchasesPost()
//

try {
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

    $data = new DtoVoucherPurchaseInput();
    $data->setFields($fields);
    $data->setOfferId("AIRCANADA_CA_001_EGIFT_USD");
    $data->setTransactionId(preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(random_bytes(14))));

    $result = $zendit->vouchersPurchasesPost($data);

    // Do some work here
    $result->getTransactionId();
    $result->getStatus();

    // JSON
    echo "_________ vouchersPurchasesPost() _________\r\n";
    echo $result . "\r\n";
    echo "______ end of vouchersPurchasesPost() _________\r\n\r\n";
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersPurchasesPost: ', $e->getMessage(), PHP_EOL;
}


//
// vouchersPurchasesTransactionIdGet()
//

try {
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
    $data = new DtoVoucherPurchaseInput();
    $data->setFields($fields);
    $data->setOfferId("AIRCANADA_CA_001_EGIFT_USD");
    $data->setTransactionId(preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(random_bytes(14))));
    $purchase = $zendit->vouchersPurchasesPost($data);

    $result = $zendit->vouchersPurchasesTransactionIdGet($purchase->getTransactionId());

    // Do some work here
    $result->getBrand();
    $result->getCost();
    $result->getCostCurrency();
    $result->getCountry();
    $result->getCreatedAt();
    $result->getError();
    $result->getFields();
    $result->getLog();
    $result->getNotes();
    $result->getOfferId();
    $result->getPrice();
    $result->getPriceCurrency();
    $result->getPriceType();
    $result->getProductType();
    $result->getReceipt();
    $result->getSend();
    $result->getSendCurrency();
    $result->getShortNotes();
    $result->getStatus();
    $result->getSubTypes();
    $result->getTransactionId();
    $result->getUpdatedAt();
    $result->getValue();

    // JSON
    echo "_________ vouchersPurchasesTransactionIdGet() _________\r\n";
    echo $result . "\r\n";
    echo "______ end of vouchersPurchasesTransactionIdGet() _________\r\n\r\n";
} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->vouchersPurchasesTransactionIdGet: ', $e->getMessage(), PHP_EOL;
}







