<?php
namespace Zendit\Test\Api;

use PHPUnit\Framework\TestCase;
use Zendit\Model\DtoTopupPurchaseMakeInput;
use Zendit\Model\DtoVoucherField;
use Zendit\Model\DtoVoucherPurchaseInput;
use Zendit\ZenditAPI;

/**
 * ZenditApiTest Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 */
class ZenditApiTest extends TestCase
{
    protected ZenditAPI $zenditApi;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass(): void
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp(): void
    {
        $apiKey = $_SERVER['ZENDIT_API_KEY'];

        $this->zenditApi = new ZenditAPI($apiKey);
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown(): void
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * Test case for balanceGet
     *
     * Get list of transactions.
     *
     */
    public function testBalanceGet()
    {
        $result = $this->zenditApi->balanceGet();

        $this->assertIsInt($result->getAvailableBalance());
        $this->assertNotEmpty($result->getCurrency());
    }

    /**
     * Test case for topupsOffersGet
     *
     * Get list of topup offers.
     *
     */
    public function testTopupsOffersGet()
    {
        $result = $this->zenditApi->topupsOffersGet(1, 0);

        foreach ($result->getList() as $value) {
            $this->assertNotEmpty($value->getOfferId());
            $this->assertNotEmpty($value->getBrand());
            $this->assertNotEmpty($value->getCost());
            $this->assertNotEmpty($value->getCountry());
            $this->assertNotEmpty($value->getBrand());
            $this->assertNotEmpty($value->getCost());
            $this->assertNotEmpty($value->getCountry());
            $this->assertNotEmpty($value->getCreatedAt());
            $this->assertNotEmpty($value->getEnabled());
            $this->assertIsString($value->getNotes());
            $this->assertNotEmpty($value->getPrice());
            $this->assertNotEmpty($value->getPriceType());
            $this->assertNotEmpty($value->getProductType());
            $this->assertNotEmpty($value->getSend());
            $this->assertIsString($value->getShortNotes());
            $this->assertNotEmpty(join(", ", $value->getSubTypes()));
            $this->assertNotEmpty($value->getUpdatedAt());
        }
    }

    /**
     * Test case for topupsOffersOfferIdGet
     *
     * Get a topup offer by the offer ID.
     *
     */
    public function testTopupsOffersOfferIdGet()
    {
        $result = $this->zenditApi->topupsOffersOfferIdGet('CUBACEL_CU_OPEN');

        $this->assertNotEmpty($result->getBrand());
        $this->assertNotEmpty($result->getCost());
        $this->assertNotEmpty($result->getCountry());
        $this->assertNotEmpty($result->getCreatedAt());
        $this->assertNotEmpty($result->getEnabled());
        $this->assertIsString($result->getNotes());
        $this->assertNotEmpty($result->getOfferId());
        $this->assertNotEmpty($result->getPrice());
        $this->assertNotEmpty($result->getPriceType());
        $this->assertNotEmpty($result->getProductType());
        $this->assertNotEmpty($result->getSend());
        $this->assertIsString($result->getShortNotes());
        $this->assertNotEmpty($result->getSubTypes());
        $this->assertNotEmpty($result->getUpdatedAt());
    }

    /**
     * Test case for topupsPurchasesGet
     *
     * Get list of topup transactions.
     *
     */
    public function testTopupsPurchasesGet()
    {
        $result = $this->zenditApi->topupsPurchasesGet(1, 0);

        foreach ($result->getList() as $value) {
            $this->assertNotEmpty($value->getBrand());
            $this->assertNotEmpty($value->getCost());
            $this->assertNotEmpty($value->getCostCurrency());
            $this->assertNotEmpty($value->getCountry());
            $this->assertNotEmpty($value->getCreatedAt());
            $this->assertNotEmpty($value->getLog());
            $this->assertIsString($value->getNotes());
            $this->assertNotEmpty($value->getOfferId());
            $this->assertNotEmpty($value->getPrice());
            $this->assertNotEmpty($value->getPriceCurrency());
            $this->assertNotEmpty($value->getPriceType());
            $this->assertNotEmpty($value->getProductType());
            $this->assertNotEmpty($value->getRecipientPhoneNumber());
            $this->assertNotEmpty($value->getSend());
            $this->assertNotEmpty($value->getSendCurrency());
            $this->assertNotEmpty($value->getSender());
            $this->assertIsString($value->getShortNotes());
            $this->assertNotEmpty($value->getStatus());
            $this->assertNotEmpty($value->getSubTypes());
            $this->assertNotEmpty($value->getTransactionId());
            $this->assertNotEmpty($value->getUpdatedAt());
        }
    }

    /**
     * Test case for topupsPurchasesPost
     *
     * Create transaction for purchase.
     *
     */
    public function testTopupsPurchasesPost()
    {
        $data = new DtoTopupPurchaseMakeInput();
        $data->setTransactionId(preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(random_bytes(14))));
        $data->setRecipientPhoneNumber("+5355564362");
        $data->setOfferId("CUBACEL_CU_PAQUETE001");

        $result = $this->zenditApi->topupsPurchasesPost($data);

        $this->assertNotEmpty($result->getStatus());
        $this->assertNotEmpty($result->getTransactionId());
    }

    /**
     * Test case for topupsPurchasesTransactionIdGet
     *
     * Get topup transaction by id.
     *
     */
    public function testTopupsPurchasesTransactionIdGet()
    {
        $data = new DtoTopupPurchaseMakeInput();
        $data->setTransactionId(preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(random_bytes(14))));
        $data->setRecipientPhoneNumber("+5355564362");
        $data->setOfferId("CUBACEL_CU_PAQUETE001");
        $purchaseData = $this->zenditApi->topupsPurchasesPost($data);

        $result = $this->zenditApi->topupsPurchasesTransactionIdGet($purchaseData->getTransactionId());

        $this->assertNotEmpty($result->getBrand());
        $this->assertNotEmpty($result->getCost());
        $this->assertNotEmpty($result->getCostCurrency());
        $this->assertNotEmpty($result->getCountry());
        $this->assertNotEmpty($result->getCreatedAt());
        $this->assertNotEmpty($result->getLog());
        $this->assertIsString($result->getNotes());
        $this->assertNotEmpty($result->getOfferId());
        $this->assertNotEmpty($result->getPrice());
        $this->assertNotEmpty($result->getPriceCurrency());
        $this->assertNotEmpty($result->getPriceType());
        $this->assertNotEmpty($result->getProductType());
        $this->assertNotEmpty($result->getRecipientPhoneNumber());
        $this->assertNotEmpty($result->getSend());
        $this->assertNotEmpty($result->getSendCurrency());
        $this->assertNotEmpty($result->getSender());
        $this->assertIsString($result->getShortNotes());
        $this->assertNotEmpty($result->getStatus());
        $this->assertNotEmpty($result->getSubTypes());
        $this->assertNotEmpty($result->getTransactionId());
        $this->assertNotEmpty($result->getUpdatedAt());
    }

    /**
     * Test case for transactionsGet
     *
     * Get list of transactions.
     *
     */
    public function testTransactionsGet()
    {
        $result = $this->zenditApi->transactionsGet(1, 0);

        foreach ($result->getList() as $value) {
            $this->assertNotEmpty($value->getTransactionId());
            $this->assertNotEmpty($value->getAmount());
            $this->assertNotEmpty($value->getLog());
            $this->assertNotEmpty($value->getCurrency());
            $this->assertNotEmpty($value->getStatus());
            $this->assertNotEmpty($value->getProductType());
            $this->assertNotEmpty($value->getType());
            $this->assertNotEmpty($value->getCreatedAt());
            $this->assertNotEmpty($value->getUpdatedAt());
        }
    }

    /**
     * Test case for transactionsTransactionIdGet
     *
     * Get transaction by id.
     *
     */
    public function testTransactionsTransactionIdGet()
    {
        $transactionId = $this->zenditApi->transactionsGet(1, 0)->getList()[0]->getTransactionId();

        $result = $this->zenditApi->transactionsTransactionIdGet($transactionId);

        $this->assertNotEmpty($result->getTransactionId());
        $this->assertNotEmpty($result->getAmount());
        $this->assertNotEmpty($result->getLog());
        $this->assertNotEmpty($result->getCurrency());
        $this->assertNotEmpty($result->getStatus());
        $this->assertNotEmpty($result->getProductType());
        $this->assertNotEmpty($result->getType());
        $this->assertNotEmpty($result->getCreatedAt());
        $this->assertNotEmpty($result->getUpdatedAt());
    }

    /**
     * Test case for vouchersOffersGet
     *
     * Get list of voucher offers.
     *
     */
    public function testVouchersOffersGet()
    {
        $result = $this->zenditApi->vouchersOffersGet(1, 0);

        // Do some work here
        foreach ($result->getList()as $value) {
            $this->assertNotEmpty($value->getOfferId());
            $this->assertNotEmpty($value->getBrand());
            $this->assertNotEmpty($value->getCost());
            $this->assertNotEmpty($value->getCountry());
            $this->assertNotEmpty($value->getCreatedAt());
            $this->assertNotEmpty($value->getEnabled());
            $this->assertIsString($value->getNotes());
            $this->assertNotEmpty($value->getPrice());
            $this->assertNotEmpty($value->getPriceType());
            $this->assertNotEmpty($value->getProductType());
            $this->assertNotEmpty($value->getSend());
            $this->assertIsString($value->getShortNotes());
            $this->assertIsString(join(", ", $value->getSubTypes()));
            $this->assertNotEmpty($value->getUpdatedAt());
        }
    }

    /**
     * Test case for vouchersOffersOfferIdGet
     *
     * Get a voucher offer by the offer ID.
     *
     */
    public function testVouchersOffersOfferIdGet()
    {
        $offerId = $this->zenditApi->vouchersOffersGet(1, 0)->getList()[0]->getOfferId();

        $result = $this->zenditApi->vouchersOffersOfferIdGet($offerId);

        $this->assertNotEmpty($result->getOfferId());
        $this->assertNotEmpty($result->getBrand());
        $this->assertNotEmpty($result->getCost());
        $this->assertNotEmpty($result->getCountry());
        $this->assertNotEmpty($result->getCreatedAt());
        $this->assertNotEmpty($result->getEnabled());
        $this->assertIsString($result->getNotes());
        $this->assertNotEmpty($result->getPrice());
        $this->assertNotEmpty($result->getPriceType());
        $this->assertNotEmpty($result->getProductType());
        $this->assertNotEmpty($result->getSend());
        $this->assertNotEmpty($result->getUpdatedAt());
    }

    /**
     * Test case for vouchersPurchasesGet
     *
     * Get list of transactions.
     *
     */
    public function testVouchersPurchasesGet()
    {
        $result = $this->zenditApi->vouchersPurchasesGet(1, 0);

        foreach ($result->getList() as $value) {
            $this->assertNotEmpty($value->getBrand());
            $this->assertNotEmpty($value->getCost());
            $this->assertNotEmpty($value->getCostCurrency());
            $this->assertNotEmpty($value->getCountry());
            $this->assertNotEmpty($value->getCreatedAt());
            $this->assertNotEmpty($value->getFields());
            $this->assertNotEmpty($value->getLog());
            $this->assertIsString($value->getNotes());
            $this->assertNotEmpty($value->getOfferId());
            $this->assertNotEmpty($value->getPrice());
            $this->assertNotEmpty($value->getPriceCurrency());
            $this->assertNotEmpty($value->getPriceType());
            $this->assertNotEmpty($value->getProductType());
            $this->assertNotEmpty($value->getSend());
            $this->assertNotEmpty($value->getSendCurrency());
            $this->assertIsString($value->getShortNotes());
            $this->assertNotEmpty($value->getStatus());
            $this->assertNotEmpty($value->getSubTypes());
            $this->assertNotEmpty($value->getTransactionId());
            $this->assertNotEmpty($value->getUpdatedAt());
        }
    }

    /**
     * Test case for vouchersPurchasesPost
     *
     * Create transaction for purchase.
     *
     */
    public function testVouchersPurchasesPost()
    {
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

        $result = $this->zenditApi->vouchersPurchasesPost($data);

        $this->assertNotEmpty($result->getTransactionId());
        $this->assertNotEmpty($result->getStatus());
    }

    /**
     * Test case for vouchersPurchasesTransactionIdGet
     *
     * Get purchase transaction by id.
     *
     */
    public function testVouchersPurchasesTransactionIdGet()
    {
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
        $purchase = $this->zenditApi->vouchersPurchasesPost($data);

        $result = $this->zenditApi->vouchersPurchasesTransactionIdGet($purchase->getTransactionId());

        $this->assertNotEmpty($result->getBrand());
        $this->assertNotEmpty($result->getCost());
        $this->assertNotEmpty($result->getCostCurrency());
        $this->assertNotEmpty($result->getCountry());
        $this->assertNotEmpty($result->getCreatedAt());
        $this->assertNotEmpty($result->getFields());
        $this->assertNotEmpty($result->getLog());
        $this->assertIsString($result->getNotes());
        $this->assertNotEmpty($result->getOfferId());
        $this->assertNotEmpty($result->getPrice());
        $this->assertNotEmpty($result->getPriceCurrency());
        $this->assertNotEmpty($result->getPriceType());
        $this->assertNotEmpty($result->getProductType());
        $this->assertNotEmpty($result->getSend());
        $this->assertNotEmpty($result->getSendCurrency());
        $this->assertIsString($result->getShortNotes());
        $this->assertNotEmpty($result->getStatus());
        $this->assertNotEmpty($result->getSubTypes());
        $this->assertNotEmpty($result->getTransactionId());
        $this->assertNotEmpty($result->getUpdatedAt());
    }
}
