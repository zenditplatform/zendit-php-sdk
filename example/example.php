<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Zendit\ZenditAPI;

$zendit = new ZenditAPI('YOUR_KEY_HERE');

try {
    $result = $zendit->balanceGet();
    echo $result->getCurrency() . "\r\n";
    echo $result->getAvailableBalance() . "\r\n";

    echo "ArrayObject" . "\r\n";

    echo $result["balance"] . "\r\n";
    echo $result["currency"] . "\r\n";

    echo "JSON" . "\r\n";

    echo $result . "\r\n";

    echo "toHeaderValue" . "\r\n";

    $result->toHeaderValue();

} catch (Exception $e) {
    echo 'Exception when calling ZenditSdk->balanceGet: ', $e->getMessage(), PHP_EOL;
}