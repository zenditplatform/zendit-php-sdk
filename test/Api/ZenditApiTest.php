<?php
namespace Zendit\Test\Api;

use PHPUnit\Framework\TestCase;
use Zendit\Model\DtoESimPurchaseMakeInput;
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
        $data->setOfferId("CUBACEL_CU_001");

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
        $data->setOfferId("CUBACEL_CU_001");
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

    /**
     * Test case for esimOffersGet
     *
     * Get list of eSims offers.
     *
     */
    public function testESIMsOffersGet()
    {
        $result = $this->zenditApi->esimOffersGet(1, 0);

        // Do some work here
        foreach ($result->getList()as $value) {
            $this->assertNotEmpty($value->getOfferId());
            $this->assertNotEmpty($value->getBrand());
            $this->assertNotEmpty($value->getCost());
            $this->assertNotEmpty($value->getPrice());
            $this->assertNotEmpty($value->getCountry());
            $this->assertNotEmpty($value->getCreatedAt());
            $this->assertNotEmpty($value->getEnabled());
            $this->assertIsString($value->getNotes());
            $this->assertNotEmpty($value->getPriceType());
            $this->assertNotEmpty($value->getProductType());
            $this->assertIsString($value->getShortNotes());
            $this->assertIsArray($value->getRoaming());
            $this->assertIsArray($value->getDataSpeeds());
            $this->assertIsFloat($value->getDataGb());
            $this->assertIsBool($value->getDataUnlimited());
            $this->assertIsString(join(", ", $value->getSubTypes()));
            $this->assertNotEmpty($value->getUpdatedAt());
        }
    }

    /**
     * Test case for esimOffersOfferIdGet
     *
     * Get an eSim offer by the offer ID.
     *
     */
    public function testESIMOffersOfferIdGet()
    {
        $offerId = $this->zenditApi->esimOffersGet(1, 0)->getList()[0]->getOfferId();

        $result = $this->zenditApi->esimOffersOfferIdGet($offerId);

        $this->assertNotEmpty($result->getOfferId());
        $this->assertNotEmpty($result->getBrand());
        $this->assertNotEmpty($result->getCost());
        $this->assertNotEmpty($result->getCreatedAt());
        $this->assertNotEmpty($result->getEnabled());
        $this->assertIsString($result->getNotes());
        $this->assertNotEmpty($result->getPrice());
        $this->assertNotEmpty($result->getPriceType());
        $this->assertNotEmpty($result->getProductType());
        $this->assertIsArray($result->getRoaming());
        $this->assertIsArray($result->getDataSpeeds());
        $this->assertIsFloat($result->getDataGb());
        $this->assertIsBool($result->getDataUnlimited());
        $this->assertNotEmpty($result->getUpdatedAt());
    }

    /**
     * Test case for esimPurchasesGet
     *
     * Get list of transactions.
     *
     */
    public function testESIMPurchasesGet()
    {
        $result = $this->zenditApi->esimPurchasesGet(1, 0);

        foreach ($result->getList() as $value) {
            $this->assertNotEmpty($value->getBrand());
            $this->assertNotEmpty($value->getCost());
            $this->assertNotEmpty($value->getCostCurrency());
            $this->assertNotEmpty($value->getCreatedAt());
            $this->assertIsString($value->getNotes());
            $this->assertNotEmpty($value->getOfferId());
            $this->assertNotEmpty($value->getPrice());
            $this->assertNotEmpty($value->getPriceCurrency());
            $this->assertNotEmpty($value->getPriceType());
            $this->assertNotEmpty($value->getProductType());
            $this->assertIsArray($value->getRoaming());
            $this->assertIsArray($value->getDataSpeeds());
            $this->assertIsFloat($value->getDataGb());
            $this->assertIsBool($value->getDataUnlimited());
            $this->assertIsString($value->getShortNotes());
            $this->assertNotEmpty($value->getStatus());
            $this->assertNotEmpty($value->getSubTypes());
            $this->assertNotEmpty($value->getTransactionId());
            $this->assertNotEmpty($value->getUpdatedAt());
        }
    }

    /**
     * Test case for ESimPurchasesPost
     *
     * Create transaction for purchase.
     *
     */
    public function testESsimPurchasesPost()
    {
        $data = new DtoESimPurchaseMakeInput();
        $data->setOfferId("ESIM-AFRICA-30D-10GB");
        $data->setTransactionId(preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(random_bytes(14))));

        $result = $this->zenditApi->esimPurchasesPost($data);

        $this->assertNotEmpty($result->getTransactionId());
        $this->assertNotEmpty($result->getStatus());
    }

    /**
     * Test case for esimPurchasesTransactionIdGet
     *
     * Get purchase transaction by id.
     *
     */
    public function testEsimsPurchasesTransactionIdGet()
    {
        $data = new DtoESimPurchaseMakeInput();
        $data->setOfferId("ESIM-AFRICA-30D-10GB");
        $data->setTransactionId(preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(random_bytes(14))));

        $purchase = $this->zenditApi->esimPurchasesPost($data);

        $result = $this->zenditApi->esimPurchasesTransactionIdGet($purchase->getTransactionId());

        $this->assertNotEmpty($result->getBrand());
        $this->assertNotEmpty($result->getCost());
        $this->assertNotEmpty($result->getCostCurrency());
        $this->assertNotEmpty($result->getCreatedAt());
        $this->assertNotEmpty($result->getLog());
        $this->assertIsString($result->getNotes());
        $this->assertNotEmpty($result->getOfferId());
        $this->assertNotEmpty($result->getPrice());
        $this->assertNotEmpty($result->getPriceCurrency());
        $this->assertNotEmpty($result->getPriceType());
        $this->assertNotEmpty($result->getProductType());
        $this->assertIsArray($result->getRoaming());
        $this->assertIsArray($result->getDataSpeeds());
        $this->assertIsFloat($result->getDataGb());
        $this->assertIsBool($result->getDataUnlimited());
        $this->assertIsString($result->getShortNotes());
        $this->assertNotEmpty($result->getStatus());
        $this->assertNotEmpty($result->getSubTypes());
        $this->assertNotEmpty($result->getTransactionId());
        $this->assertNotEmpty($result->getUpdatedAt());
    }

    /**
     * Test case for vouchersPurchasesTransactionIdGet
     *
     * Get purchase transaction by id.
     *
     */
    public function testEsimPurchasesTransactionIdQrcodeGet()
    {
        $response = $this->zenditApi->esimPurchasesGet(1, 0);
        if ($response->getList()) {
            $purchase = $response->getList()[0];
            $purchaseID = $purchase->getTransactionId();

            sleep(5); // Wait for the Done state to be able to get QR code
            $purchase = $this->zenditApi->esimPurchasesTransactionIdQrcodeGet($purchaseID, "application/json");
            $this->assertNotEmpty($purchase->getImageBase64());

            $purchase = $this->zenditApi->esimPurchasesTransactionIdQrcodeGet($purchaseID, "image/png");
            $this->assertNotEmpty($purchase->getFilename());
        }
    }

    /**
     * Test case for testEsimPlans
     *
     * Purchase and get esim plans.
     *
     */
    public function testEsimPlans()
    {
        $response = $this->zenditApi->esimPurchasesGet(2, 0);
        if ($response->getList()) {
            $purchase = $response->getList()[1];
            $iccId = $purchase->getConfirmation()->getIccid();

            $data = new DtoESimPurchaseMakeInput();
            $data->setOfferId("ESIM-AFRICA-30D-10GB");
            $data->setTransactionId(preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(random_bytes(14))));
            $data->setIccid($iccId);

            $result = $this->zenditApi->esimPurchasesPost($data);

            $this->assertNotEmpty($result->getTransactionId());
            $this->assertNotEmpty($result->getStatus());

            $plans = $this->zenditApi->esimIccIdPlansGet($iccId);
            $this->assertNotEmpty($plans->getList());
        }
    }
}
