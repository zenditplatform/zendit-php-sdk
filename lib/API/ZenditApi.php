<?php

namespace Zendit\API;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Zendit\ApiException;
use Zendit\Configuration;
use Zendit\HeaderSelector;
use Zendit\ObjectSerializer;

/**
 * ZenditSdk Class Doc Comment
 *
 * @category Class
 * @package  Zendit
 * @author   Zendit
 * @link     https://developers.zendit.io/api
 */
class ZenditApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'balanceGet' => [
            'application/json',
        ],
        'topupsOffersGet' => [
            'application/json',
        ],
        'topupsOffersOfferIdGet' => [
            'application/json',
        ],
        'topupsPurchasesGet' => [
            'application/json',
        ],
        'topupsPurchasesPost' => [
            'application/json',
        ],
        'topupsPurchasesTransactionIdGet' => [
            'application/json',
        ],
        'transactionsGet' => [
            'application/json',
        ],
        'transactionsTransactionIdGet' => [
            'application/json',
        ],
        'vouchersOffersGet' => [
            'application/json',
        ],
        'vouchersOffersOfferIdGet' => [
            'application/json',
        ],
        'vouchersPurchasesGet' => [
            'application/json',
        ],
        'vouchersPurchasesPost' => [
            'application/json',
        ],
        'vouchersPurchasesTransactionIdGet' => [
            'application/json',
        ],
    ];

/**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation balanceGet
     *
     * Get list of transactions
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['balanceGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Zendit\Model\DtoBalanceResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError
     */
    public function balanceGet(string $contentType = self::contentTypes['balanceGet'][0])
    {
        list($response) = $this->balanceGetWithHttpInfo($contentType);
        return $response;
    }

    /**
     * Operation balanceGetWithHttpInfo
     *
     * Get list of transactions
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['balanceGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Zendit\Model\DtoBalanceResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError, HTTP status code, HTTP response headers (array of strings)
     */
    public function balanceGetWithHttpInfo(string $contentType = self::contentTypes['balanceGet'][0])
    {
        $request = $this->balanceGetRequest($contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Zendit\Model\DtoBalanceResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\DtoBalanceResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\DtoBalanceResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Zendit\Model\DtoBalanceResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\DtoBalanceResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation balanceGetAsync
     *
     * Get list of transactions
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['balanceGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function balanceGetAsync(string $contentType = self::contentTypes['balanceGet'][0])
    {
        return $this->balanceGetAsyncWithHttpInfo($contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation balanceGetAsyncWithHttpInfo
     *
     * Get list of transactions
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['balanceGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function balanceGetAsyncWithHttpInfo(string $contentType = self::contentTypes['balanceGet'][0])
    {
        $returnType = '\Zendit\Model\DtoBalanceResponse';
        $request = $this->balanceGetRequest($contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'balanceGet'
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['balanceGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function balanceGetRequest(string $contentType = self::contentTypes['balanceGet'][0])
    {


        $resourcePath = '/balance';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation topupsOffersGet
     *
     * Get list of topup offers
     *
     * @param  int $_limit _limit (required)
     * @param  int $_offset _offset (required)
     * @param  string $brand brand (optional)
     * @param  string $country country (optional)
     * @param  string $sub_type sub_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsOffersGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Zendit\Model\DtoTopupOffersResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError
     */
    public function topupsOffersGet($_limit, $_offset, $brand = null, $country = null, $sub_type = null, string $contentType = self::contentTypes['topupsOffersGet'][0])
    {
        list($response) = $this->topupsOffersGetWithHttpInfo($_limit, $_offset, $brand, $country, $sub_type, $contentType);
        return $response;
    }

    /**
     * Operation topupsOffersGetWithHttpInfo
     *
     * Get list of topup offers
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $brand (optional)
     * @param  string $country (optional)
     * @param  string $sub_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsOffersGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Zendit\Model\DtoTopupOffersResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError, HTTP status code, HTTP response headers (array of strings)
     */
    public function topupsOffersGetWithHttpInfo($_limit, $_offset, $brand = null, $country = null, $sub_type = null, string $contentType = self::contentTypes['topupsOffersGet'][0])
    {
        $request = $this->topupsOffersGetRequest($_limit, $_offset, $brand, $country, $sub_type, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Zendit\Model\DtoTopupOffersResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\DtoTopupOffersResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\DtoTopupOffersResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Zendit\Model\DtoTopupOffersResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\DtoTopupOffersResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation topupsOffersGetAsync
     *
     * Get list of topup offers
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $brand (optional)
     * @param  string $country (optional)
     * @param  string $sub_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsOffersGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function topupsOffersGetAsync($_limit, $_offset, $brand = null, $country = null, $sub_type = null, string $contentType = self::contentTypes['topupsOffersGet'][0])
    {
        return $this->topupsOffersGetAsyncWithHttpInfo($_limit, $_offset, $brand, $country, $sub_type, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation topupsOffersGetAsyncWithHttpInfo
     *
     * Get list of topup offers
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $brand (optional)
     * @param  string $country (optional)
     * @param  string $sub_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsOffersGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function topupsOffersGetAsyncWithHttpInfo($_limit, $_offset, $brand = null, $country = null, $sub_type = null, string $contentType = self::contentTypes['topupsOffersGet'][0])
    {
        $returnType = '\Zendit\Model\DtoTopupOffersResponse';
        $request = $this->topupsOffersGetRequest($_limit, $_offset, $brand, $country, $sub_type, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'topupsOffersGet'
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $brand (optional)
     * @param  string $country (optional)
     * @param  string $sub_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsOffersGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function topupsOffersGetRequest($_limit, $_offset, $brand = null, $country = null, $sub_type = null, string $contentType = self::contentTypes['topupsOffersGet'][0])
    {

        // verify the required parameter '_limit' is set
        if ($_limit === null || (is_array($_limit) && count($_limit) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $_limit when calling topupsOffersGet'
            );
        }

        // verify the required parameter '_offset' is set
        if ($_offset === null || (is_array($_offset) && count($_offset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $_offset when calling topupsOffersGet'
            );
        }





        $resourcePath = '/topups/offers';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $_limit,
            '_limit', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $_offset,
            '_offset', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $brand,
            'brand', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $country,
            'country', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sub_type,
            'subType', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation topupsOffersOfferIdGet
     *
     * Get a topup offer by the offer ID
     *
     * @param  string $offer_id Get topup by id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsOffersOfferIdGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Zendit\Model\DtoTopupOffer|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError
     */
    public function topupsOffersOfferIdGet($offer_id, string $contentType = self::contentTypes['topupsOffersOfferIdGet'][0])
    {
        list($response) = $this->topupsOffersOfferIdGetWithHttpInfo($offer_id, $contentType);
        return $response;
    }

    /**
     * Operation topupsOffersOfferIdGetWithHttpInfo
     *
     * Get a topup offer by the offer ID
     *
     * @param  string $offer_id Get topup by id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsOffersOfferIdGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Zendit\Model\DtoTopupOffer|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError, HTTP status code, HTTP response headers (array of strings)
     */
    public function topupsOffersOfferIdGetWithHttpInfo($offer_id, string $contentType = self::contentTypes['topupsOffersOfferIdGet'][0])
    {
        $request = $this->topupsOffersOfferIdGetRequest($offer_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Zendit\Model\DtoTopupOffer' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\DtoTopupOffer' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\DtoTopupOffer', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Zendit\Model\DtoTopupOffer';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\DtoTopupOffer',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation topupsOffersOfferIdGetAsync
     *
     * Get a topup offer by the offer ID
     *
     * @param  string $offer_id Get topup by id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsOffersOfferIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function topupsOffersOfferIdGetAsync($offer_id, string $contentType = self::contentTypes['topupsOffersOfferIdGet'][0])
    {
        return $this->topupsOffersOfferIdGetAsyncWithHttpInfo($offer_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation topupsOffersOfferIdGetAsyncWithHttpInfo
     *
     * Get a topup offer by the offer ID
     *
     * @param  string $offer_id Get topup by id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsOffersOfferIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function topupsOffersOfferIdGetAsyncWithHttpInfo($offer_id, string $contentType = self::contentTypes['topupsOffersOfferIdGet'][0])
    {
        $returnType = '\Zendit\Model\DtoTopupOffer';
        $request = $this->topupsOffersOfferIdGetRequest($offer_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'topupsOffersOfferIdGet'
     *
     * @param  string $offer_id Get topup by id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsOffersOfferIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function topupsOffersOfferIdGetRequest($offer_id, string $contentType = self::contentTypes['topupsOffersOfferIdGet'][0])
    {

        // verify the required parameter 'offer_id' is set
        if ($offer_id === null || (is_array($offer_id) && count($offer_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $offer_id when calling topupsOffersOfferIdGet'
            );
        }


        $resourcePath = '/topups/offers/{offerId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($offer_id !== null) {
            $resourcePath = str_replace(
                '{' . 'offerId' . '}',
                ObjectSerializer::toPathValue($offer_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation topupsPurchasesGet
     *
     * Get list of topup transactions
     *
     * @param  int $_limit _limit (required)
     * @param  int $_offset _offset (required)
     * @param  string $created_at created_at (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Zendit\Model\DtoTopupPurchasesResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError
     */
    public function topupsPurchasesGet($_limit, $_offset, $created_at = null, string $contentType = self::contentTypes['topupsPurchasesGet'][0])
    {
        list($response) = $this->topupsPurchasesGetWithHttpInfo($_limit, $_offset, $created_at, $contentType);
        return $response;
    }

    /**
     * Operation topupsPurchasesGetWithHttpInfo
     *
     * Get list of topup transactions
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $created_at (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Zendit\Model\DtoTopupPurchasesResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError, HTTP status code, HTTP response headers (array of strings)
     */
    public function topupsPurchasesGetWithHttpInfo($_limit, $_offset, $created_at = null, string $contentType = self::contentTypes['topupsPurchasesGet'][0])
    {
        $request = $this->topupsPurchasesGetRequest($_limit, $_offset, $created_at, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Zendit\Model\DtoTopupPurchasesResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\DtoTopupPurchasesResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\DtoTopupPurchasesResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Zendit\Model\DtoTopupPurchasesResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\DtoTopupPurchasesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation topupsPurchasesGetAsync
     *
     * Get list of topup transactions
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $created_at (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function topupsPurchasesGetAsync($_limit, $_offset, $created_at = null, string $contentType = self::contentTypes['topupsPurchasesGet'][0])
    {
        return $this->topupsPurchasesGetAsyncWithHttpInfo($_limit, $_offset, $created_at, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation topupsPurchasesGetAsyncWithHttpInfo
     *
     * Get list of topup transactions
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $created_at (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function topupsPurchasesGetAsyncWithHttpInfo($_limit, $_offset, $created_at = null, string $contentType = self::contentTypes['topupsPurchasesGet'][0])
    {
        $returnType = '\Zendit\Model\DtoTopupPurchasesResponse';
        $request = $this->topupsPurchasesGetRequest($_limit, $_offset, $created_at, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'topupsPurchasesGet'
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $created_at (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function topupsPurchasesGetRequest($_limit, $_offset, $created_at = null, string $contentType = self::contentTypes['topupsPurchasesGet'][0])
    {

        // verify the required parameter '_limit' is set
        if ($_limit === null || (is_array($_limit) && count($_limit) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $_limit when calling topupsPurchasesGet'
            );
        }

        // verify the required parameter '_offset' is set
        if ($_offset === null || (is_array($_offset) && count($_offset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $_offset when calling topupsPurchasesGet'
            );
        }



        $resourcePath = '/topups/purchases';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $_limit,
            '_limit', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $_offset,
            '_offset', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $created_at,
            'createdAt', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation topupsPurchasesPost
     *
     * Create transaction for purchase
     *
     * @param  \Zendit\Model\DtoTopupPurchaseMakeInput $data Purchase input data (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesPost'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Zendit\Model\DtoTopupPurchaseResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError
     */
    public function topupsPurchasesPost($data, string $contentType = self::contentTypes['topupsPurchasesPost'][0])
    {
        list($response) = $this->topupsPurchasesPostWithHttpInfo($data, $contentType);
        return $response;
    }

    /**
     * Operation topupsPurchasesPostWithHttpInfo
     *
     * Create transaction for purchase
     *
     * @param  \Zendit\Model\DtoTopupPurchaseMakeInput $data Purchase input data (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesPost'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Zendit\Model\DtoTopupPurchaseResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError, HTTP status code, HTTP response headers (array of strings)
     */
    public function topupsPurchasesPostWithHttpInfo($data, string $contentType = self::contentTypes['topupsPurchasesPost'][0])
    {
        $request = $this->topupsPurchasesPostRequest($data, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Zendit\Model\DtoTopupPurchaseResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\DtoTopupPurchaseResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\DtoTopupPurchaseResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Zendit\Model\DtoTopupPurchaseResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\DtoTopupPurchaseResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation topupsPurchasesPostAsync
     *
     * Create transaction for purchase
     *
     * @param  \Zendit\Model\DtoTopupPurchaseMakeInput $data Purchase input data (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function topupsPurchasesPostAsync($data, string $contentType = self::contentTypes['topupsPurchasesPost'][0])
    {
        return $this->topupsPurchasesPostAsyncWithHttpInfo($data, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation topupsPurchasesPostAsyncWithHttpInfo
     *
     * Create transaction for purchase
     *
     * @param  \Zendit\Model\DtoTopupPurchaseMakeInput $data Purchase input data (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function topupsPurchasesPostAsyncWithHttpInfo($data, string $contentType = self::contentTypes['topupsPurchasesPost'][0])
    {
        $returnType = '\Zendit\Model\DtoTopupPurchaseResponse';
        $request = $this->topupsPurchasesPostRequest($data, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'topupsPurchasesPost'
     *
     * @param  \Zendit\Model\DtoTopupPurchaseMakeInput $data Purchase input data (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function topupsPurchasesPostRequest($data, string $contentType = self::contentTypes['topupsPurchasesPost'][0])
    {

        // verify the required parameter 'data' is set
        if ($data === null || (is_array($data) && count($data) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $data when calling topupsPurchasesPost'
            );
        }


        $resourcePath = '/topups/purchases';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($data)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($data));
            } else {
                $httpBody = $data;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation topupsPurchasesTransactionIdGet
     *
     * Get topup transaction by id
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Zendit\Model\DtoTopupPurchase|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError
     */
    public function topupsPurchasesTransactionIdGet($transaction_id, string $contentType = self::contentTypes['topupsPurchasesTransactionIdGet'][0])
    {
        list($response) = $this->topupsPurchasesTransactionIdGetWithHttpInfo($transaction_id, $contentType);
        return $response;
    }

    /**
     * Operation topupsPurchasesTransactionIdGetWithHttpInfo
     *
     * Get topup transaction by id
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Zendit\Model\DtoTopupPurchase|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError, HTTP status code, HTTP response headers (array of strings)
     */
    public function topupsPurchasesTransactionIdGetWithHttpInfo($transaction_id, string $contentType = self::contentTypes['topupsPurchasesTransactionIdGet'][0])
    {
        $request = $this->topupsPurchasesTransactionIdGetRequest($transaction_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Zendit\Model\DtoTopupPurchase' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\DtoTopupPurchase' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\DtoTopupPurchase', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Zendit\Model\DtoTopupPurchase';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\DtoTopupPurchase',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation topupsPurchasesTransactionIdGetAsync
     *
     * Get topup transaction by id
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function topupsPurchasesTransactionIdGetAsync($transaction_id, string $contentType = self::contentTypes['topupsPurchasesTransactionIdGet'][0])
    {
        return $this->topupsPurchasesTransactionIdGetAsyncWithHttpInfo($transaction_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation topupsPurchasesTransactionIdGetAsyncWithHttpInfo
     *
     * Get topup transaction by id
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function topupsPurchasesTransactionIdGetAsyncWithHttpInfo($transaction_id, string $contentType = self::contentTypes['topupsPurchasesTransactionIdGet'][0])
    {
        $returnType = '\Zendit\Model\DtoTopupPurchase';
        $request = $this->topupsPurchasesTransactionIdGetRequest($transaction_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'topupsPurchasesTransactionIdGet'
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['topupsPurchasesTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function topupsPurchasesTransactionIdGetRequest($transaction_id, string $contentType = self::contentTypes['topupsPurchasesTransactionIdGet'][0])
    {

        // verify the required parameter 'transaction_id' is set
        if ($transaction_id === null || (is_array($transaction_id) && count($transaction_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $transaction_id when calling topupsPurchasesTransactionIdGet'
            );
        }


        $resourcePath = '/topups/purchases/{transactionId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($transaction_id !== null) {
            $resourcePath = str_replace(
                '{' . 'transactionId' . '}',
                ObjectSerializer::toPathValue($transaction_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation transactionsGet
     *
     * Get list of transactions
     *
     * @param  int $_limit _limit (required)
     * @param  int $_offset _offset (required)
     * @param  string $created_at created_at (optional)
     * @param  string $product_type product_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transactionsGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Zendit\Model\DtoTransactionsResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError
     */
    public function transactionsGet($_limit, $_offset, $created_at = null, $product_type = null, string $contentType = self::contentTypes['transactionsGet'][0])
    {
        list($response) = $this->transactionsGetWithHttpInfo($_limit, $_offset, $created_at, $product_type, $contentType);
        return $response;
    }

    /**
     * Operation transactionsGetWithHttpInfo
     *
     * Get list of transactions
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $created_at (optional)
     * @param  string $product_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transactionsGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Zendit\Model\DtoTransactionsResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError, HTTP status code, HTTP response headers (array of strings)
     */
    public function transactionsGetWithHttpInfo($_limit, $_offset, $created_at = null, $product_type = null, string $contentType = self::contentTypes['transactionsGet'][0])
    {
        $request = $this->transactionsGetRequest($_limit, $_offset, $created_at, $product_type, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Zendit\Model\DtoTransactionsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\DtoTransactionsResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\DtoTransactionsResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Zendit\Model\DtoTransactionsResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\DtoTransactionsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation transactionsGetAsync
     *
     * Get list of transactions
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $created_at (optional)
     * @param  string $product_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transactionsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function transactionsGetAsync($_limit, $_offset, $created_at = null, $product_type = null, string $contentType = self::contentTypes['transactionsGet'][0])
    {
        return $this->transactionsGetAsyncWithHttpInfo($_limit, $_offset, $created_at, $product_type, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation transactionsGetAsyncWithHttpInfo
     *
     * Get list of transactions
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $created_at (optional)
     * @param  string $product_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transactionsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function transactionsGetAsyncWithHttpInfo($_limit, $_offset, $created_at = null, $product_type = null, string $contentType = self::contentTypes['transactionsGet'][0])
    {
        $returnType = '\Zendit\Model\DtoTransactionsResponse';
        $request = $this->transactionsGetRequest($_limit, $_offset, $created_at, $product_type, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'transactionsGet'
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $created_at (optional)
     * @param  string $product_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transactionsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function transactionsGetRequest($_limit, $_offset, $created_at = null, $product_type = null, string $contentType = self::contentTypes['transactionsGet'][0])
    {

        // verify the required parameter '_limit' is set
        if ($_limit === null || (is_array($_limit) && count($_limit) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $_limit when calling transactionsGet'
            );
        }

        // verify the required parameter '_offset' is set
        if ($_offset === null || (is_array($_offset) && count($_offset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $_offset when calling transactionsGet'
            );
        }




        $resourcePath = '/transactions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $_limit,
            '_limit', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $_offset,
            '_offset', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $created_at,
            'createdAt', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $product_type,
            'productType', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation transactionsTransactionIdGet
     *
     * Get transaction by id
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transactionsTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Zendit\Model\DtoTransaction|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError
     */
    public function transactionsTransactionIdGet($transaction_id, string $contentType = self::contentTypes['transactionsTransactionIdGet'][0])
    {
        list($response) = $this->transactionsTransactionIdGetWithHttpInfo($transaction_id, $contentType);
        return $response;
    }

    /**
     * Operation transactionsTransactionIdGetWithHttpInfo
     *
     * Get transaction by id
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transactionsTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Zendit\Model\DtoTransaction|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError, HTTP status code, HTTP response headers (array of strings)
     */
    public function transactionsTransactionIdGetWithHttpInfo($transaction_id, string $contentType = self::contentTypes['transactionsTransactionIdGet'][0])
    {
        $request = $this->transactionsTransactionIdGetRequest($transaction_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Zendit\Model\DtoTransaction' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\DtoTransaction' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\DtoTransaction', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Zendit\Model\DtoTransaction';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\DtoTransaction',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation transactionsTransactionIdGetAsync
     *
     * Get transaction by id
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transactionsTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function transactionsTransactionIdGetAsync($transaction_id, string $contentType = self::contentTypes['transactionsTransactionIdGet'][0])
    {
        return $this->transactionsTransactionIdGetAsyncWithHttpInfo($transaction_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation transactionsTransactionIdGetAsyncWithHttpInfo
     *
     * Get transaction by id
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transactionsTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function transactionsTransactionIdGetAsyncWithHttpInfo($transaction_id, string $contentType = self::contentTypes['transactionsTransactionIdGet'][0])
    {
        $returnType = '\Zendit\Model\DtoTransaction';
        $request = $this->transactionsTransactionIdGetRequest($transaction_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'transactionsTransactionIdGet'
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transactionsTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function transactionsTransactionIdGetRequest($transaction_id, string $contentType = self::contentTypes['transactionsTransactionIdGet'][0])
    {

        // verify the required parameter 'transaction_id' is set
        if ($transaction_id === null || (is_array($transaction_id) && count($transaction_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $transaction_id when calling transactionsTransactionIdGet'
            );
        }


        $resourcePath = '/transactions/{transactionId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($transaction_id !== null) {
            $resourcePath = str_replace(
                '{' . 'transactionId' . '}',
                ObjectSerializer::toPathValue($transaction_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation vouchersOffersGet
     *
     * Get list of voucher offers
     *
     * @param  int $_limit _limit (required)
     * @param  int $_offset _offset (required)
     * @param  string $brand brand (optional)
     * @param  string $country country (optional)
     * @param  string $sub_type sub_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersOffersGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Zendit\Model\DtoVoucherOffersResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError
     */
    public function vouchersOffersGet($_limit, $_offset, $brand = null, $country = null, $sub_type = null, string $contentType = self::contentTypes['vouchersOffersGet'][0])
    {
        list($response) = $this->vouchersOffersGetWithHttpInfo($_limit, $_offset, $brand, $country, $sub_type, $contentType);
        return $response;
    }

    /**
     * Operation vouchersOffersGetWithHttpInfo
     *
     * Get list of voucher offers
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $brand (optional)
     * @param  string $country (optional)
     * @param  string $sub_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersOffersGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Zendit\Model\DtoVoucherOffersResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError, HTTP status code, HTTP response headers (array of strings)
     */
    public function vouchersOffersGetWithHttpInfo($_limit, $_offset, $brand = null, $country = null, $sub_type = null, string $contentType = self::contentTypes['vouchersOffersGet'][0])
    {
        $request = $this->vouchersOffersGetRequest($_limit, $_offset, $brand, $country, $sub_type, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Zendit\Model\DtoVoucherOffersResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\DtoVoucherOffersResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\DtoVoucherOffersResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Zendit\Model\DtoVoucherOffersResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\DtoVoucherOffersResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation vouchersOffersGetAsync
     *
     * Get list of voucher offers
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $brand (optional)
     * @param  string $country (optional)
     * @param  string $sub_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersOffersGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vouchersOffersGetAsync($_limit, $_offset, $brand = null, $country = null, $sub_type = null, string $contentType = self::contentTypes['vouchersOffersGet'][0])
    {
        return $this->vouchersOffersGetAsyncWithHttpInfo($_limit, $_offset, $brand, $country, $sub_type, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation vouchersOffersGetAsyncWithHttpInfo
     *
     * Get list of voucher offers
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $brand (optional)
     * @param  string $country (optional)
     * @param  string $sub_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersOffersGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vouchersOffersGetAsyncWithHttpInfo($_limit, $_offset, $brand = null, $country = null, $sub_type = null, string $contentType = self::contentTypes['vouchersOffersGet'][0])
    {
        $returnType = '\Zendit\Model\DtoVoucherOffersResponse';
        $request = $this->vouchersOffersGetRequest($_limit, $_offset, $brand, $country, $sub_type, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'vouchersOffersGet'
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $brand (optional)
     * @param  string $country (optional)
     * @param  string $sub_type (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersOffersGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function vouchersOffersGetRequest($_limit, $_offset, $brand = null, $country = null, $sub_type = null, string $contentType = self::contentTypes['vouchersOffersGet'][0])
    {

        // verify the required parameter '_limit' is set
        if ($_limit === null || (is_array($_limit) && count($_limit) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $_limit when calling vouchersOffersGet'
            );
        }

        // verify the required parameter '_offset' is set
        if ($_offset === null || (is_array($_offset) && count($_offset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $_offset when calling vouchersOffersGet'
            );
        }





        $resourcePath = '/vouchers/offers';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $_limit,
            '_limit', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $_offset,
            '_offset', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $brand,
            'brand', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $country,
            'country', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sub_type,
            'subType', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation vouchersOffersOfferIdGet
     *
     * Get a voucher offer by the offer ID
     *
     * @param  string $offer_id Get voucher by id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersOffersOfferIdGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Zendit\Model\DtoVoucherOffer|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError
     */
    public function vouchersOffersOfferIdGet($offer_id, string $contentType = self::contentTypes['vouchersOffersOfferIdGet'][0])
    {
        list($response) = $this->vouchersOffersOfferIdGetWithHttpInfo($offer_id, $contentType);
        return $response;
    }

    /**
     * Operation vouchersOffersOfferIdGetWithHttpInfo
     *
     * Get a voucher offer by the offer ID
     *
     * @param  string $offer_id Get voucher by id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersOffersOfferIdGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Zendit\Model\DtoVoucherOffer|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError, HTTP status code, HTTP response headers (array of strings)
     */
    public function vouchersOffersOfferIdGetWithHttpInfo($offer_id, string $contentType = self::contentTypes['vouchersOffersOfferIdGet'][0])
    {
        $request = $this->vouchersOffersOfferIdGetRequest($offer_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Zendit\Model\DtoVoucherOffer' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\DtoVoucherOffer' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\DtoVoucherOffer', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Zendit\Model\DtoVoucherOffer';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\DtoVoucherOffer',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation vouchersOffersOfferIdGetAsync
     *
     * Get a voucher offer by the offer ID
     *
     * @param  string $offer_id Get voucher by id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersOffersOfferIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vouchersOffersOfferIdGetAsync($offer_id, string $contentType = self::contentTypes['vouchersOffersOfferIdGet'][0])
    {
        return $this->vouchersOffersOfferIdGetAsyncWithHttpInfo($offer_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation vouchersOffersOfferIdGetAsyncWithHttpInfo
     *
     * Get a voucher offer by the offer ID
     *
     * @param  string $offer_id Get voucher by id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersOffersOfferIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vouchersOffersOfferIdGetAsyncWithHttpInfo($offer_id, string $contentType = self::contentTypes['vouchersOffersOfferIdGet'][0])
    {
        $returnType = '\Zendit\Model\DtoVoucherOffer';
        $request = $this->vouchersOffersOfferIdGetRequest($offer_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'vouchersOffersOfferIdGet'
     *
     * @param  string $offer_id Get voucher by id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersOffersOfferIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function vouchersOffersOfferIdGetRequest($offer_id, string $contentType = self::contentTypes['vouchersOffersOfferIdGet'][0])
    {

        // verify the required parameter 'offer_id' is set
        if ($offer_id === null || (is_array($offer_id) && count($offer_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $offer_id when calling vouchersOffersOfferIdGet'
            );
        }


        $resourcePath = '/vouchers/offers/{offerId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($offer_id !== null) {
            $resourcePath = str_replace(
                '{' . 'offerId' . '}',
                ObjectSerializer::toPathValue($offer_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation vouchersPurchasesGet
     *
     * Get list of transactions
     *
     * @param  int $_limit _limit (required)
     * @param  int $_offset _offset (required)
     * @param  string $created_at created_at (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Zendit\Model\DtoVoucherPurchasesResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError
     */
    public function vouchersPurchasesGet($_limit, $_offset, $created_at = null, string $contentType = self::contentTypes['vouchersPurchasesGet'][0])
    {
        list($response) = $this->vouchersPurchasesGetWithHttpInfo($_limit, $_offset, $created_at, $contentType);
        return $response;
    }

    /**
     * Operation vouchersPurchasesGetWithHttpInfo
     *
     * Get list of transactions
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $created_at (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Zendit\Model\DtoVoucherPurchasesResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError, HTTP status code, HTTP response headers (array of strings)
     */
    public function vouchersPurchasesGetWithHttpInfo($_limit, $_offset, $created_at = null, string $contentType = self::contentTypes['vouchersPurchasesGet'][0])
    {
        $request = $this->vouchersPurchasesGetRequest($_limit, $_offset, $created_at, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Zendit\Model\DtoVoucherPurchasesResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\DtoVoucherPurchasesResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\DtoVoucherPurchasesResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Zendit\Model\DtoVoucherPurchasesResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\DtoVoucherPurchasesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation vouchersPurchasesGetAsync
     *
     * Get list of transactions
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $created_at (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vouchersPurchasesGetAsync($_limit, $_offset, $created_at = null, string $contentType = self::contentTypes['vouchersPurchasesGet'][0])
    {
        return $this->vouchersPurchasesGetAsyncWithHttpInfo($_limit, $_offset, $created_at, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation vouchersPurchasesGetAsyncWithHttpInfo
     *
     * Get list of transactions
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $created_at (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vouchersPurchasesGetAsyncWithHttpInfo($_limit, $_offset, $created_at = null, string $contentType = self::contentTypes['vouchersPurchasesGet'][0])
    {
        $returnType = '\Zendit\Model\DtoVoucherPurchasesResponse';
        $request = $this->vouchersPurchasesGetRequest($_limit, $_offset, $created_at, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'vouchersPurchasesGet'
     *
     * @param  int $_limit (required)
     * @param  int $_offset (required)
     * @param  string $created_at (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function vouchersPurchasesGetRequest($_limit, $_offset, $created_at = null, string $contentType = self::contentTypes['vouchersPurchasesGet'][0])
    {

        // verify the required parameter '_limit' is set
        if ($_limit === null || (is_array($_limit) && count($_limit) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $_limit when calling vouchersPurchasesGet'
            );
        }

        // verify the required parameter '_offset' is set
        if ($_offset === null || (is_array($_offset) && count($_offset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $_offset when calling vouchersPurchasesGet'
            );
        }



        $resourcePath = '/vouchers/purchases';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $_limit,
            '_limit', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $_offset,
            '_offset', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $created_at,
            'createdAt', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation vouchersPurchasesPost
     *
     * Create transaction for purchase
     *
     * @param  \Zendit\Model\DtoVoucherPurchaseInput $data Purchase input data (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesPost'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Zendit\Model\DtoVoucherPurchaseResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError
     */
    public function vouchersPurchasesPost($data, string $contentType = self::contentTypes['vouchersPurchasesPost'][0])
    {
        list($response) = $this->vouchersPurchasesPostWithHttpInfo($data, $contentType);
        return $response;
    }

    /**
     * Operation vouchersPurchasesPostWithHttpInfo
     *
     * Create transaction for purchase
     *
     * @param  \Zendit\Model\DtoVoucherPurchaseInput $data Purchase input data (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesPost'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Zendit\Model\DtoVoucherPurchaseResponse|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError, HTTP status code, HTTP response headers (array of strings)
     */
    public function vouchersPurchasesPostWithHttpInfo($data, string $contentType = self::contentTypes['vouchersPurchasesPost'][0])
    {
        $request = $this->vouchersPurchasesPostRequest($data, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Zendit\Model\DtoVoucherPurchaseResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\DtoVoucherPurchaseResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\DtoVoucherPurchaseResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Zendit\Model\DtoVoucherPurchaseResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\DtoVoucherPurchaseResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation vouchersPurchasesPostAsync
     *
     * Create transaction for purchase
     *
     * @param  \Zendit\Model\DtoVoucherPurchaseInput $data Purchase input data (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vouchersPurchasesPostAsync($data, string $contentType = self::contentTypes['vouchersPurchasesPost'][0])
    {
        return $this->vouchersPurchasesPostAsyncWithHttpInfo($data, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation vouchersPurchasesPostAsyncWithHttpInfo
     *
     * Create transaction for purchase
     *
     * @param  \Zendit\Model\DtoVoucherPurchaseInput $data Purchase input data (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vouchersPurchasesPostAsyncWithHttpInfo($data, string $contentType = self::contentTypes['vouchersPurchasesPost'][0])
    {
        $returnType = '\Zendit\Model\DtoVoucherPurchaseResponse';
        $request = $this->vouchersPurchasesPostRequest($data, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'vouchersPurchasesPost'
     *
     * @param  \Zendit\Model\DtoVoucherPurchaseInput $data Purchase input data (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function vouchersPurchasesPostRequest($data, string $contentType = self::contentTypes['vouchersPurchasesPost'][0])
    {

        // verify the required parameter 'data' is set
        if ($data === null || (is_array($data) && count($data) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $data when calling vouchersPurchasesPost'
            );
        }


        $resourcePath = '/vouchers/purchases';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($data)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($data));
            } else {
                $httpBody = $data;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation vouchersPurchasesTransactionIdGet
     *
     * Get purchase transaction by id
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Zendit\Model\DtoVoucherPurchase|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError
     */
    public function vouchersPurchasesTransactionIdGet($transaction_id, string $contentType = self::contentTypes['vouchersPurchasesTransactionIdGet'][0])
    {
        list($response) = $this->vouchersPurchasesTransactionIdGetWithHttpInfo($transaction_id, $contentType);
        return $response;
    }

    /**
     * Operation vouchersPurchasesTransactionIdGetWithHttpInfo
     *
     * Get purchase transaction by id
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \Zendit\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Zendit\Model\DtoVoucherPurchase|\Zendit\Model\CoreHTTPResponseZenditError|\Zendit\Model\CoreHTTPResponseZenditError, HTTP status code, HTTP response headers (array of strings)
     */
    public function vouchersPurchasesTransactionIdGetWithHttpInfo($transaction_id, string $contentType = self::contentTypes['vouchersPurchasesTransactionIdGet'][0])
    {
        $request = $this->vouchersPurchasesTransactionIdGetRequest($transaction_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Zendit\Model\DtoVoucherPurchase' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\DtoVoucherPurchase' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\DtoVoucherPurchase', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Zendit\Model\CoreHTTPResponseZenditError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Zendit\Model\CoreHTTPResponseZenditError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Zendit\Model\CoreHTTPResponseZenditError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Zendit\Model\DtoVoucherPurchase';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\DtoVoucherPurchase',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Zendit\Model\CoreHTTPResponseZenditError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation vouchersPurchasesTransactionIdGetAsync
     *
     * Get purchase transaction by id
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vouchersPurchasesTransactionIdGetAsync($transaction_id, string $contentType = self::contentTypes['vouchersPurchasesTransactionIdGet'][0])
    {
        return $this->vouchersPurchasesTransactionIdGetAsyncWithHttpInfo($transaction_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation vouchersPurchasesTransactionIdGetAsyncWithHttpInfo
     *
     * Get purchase transaction by id
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vouchersPurchasesTransactionIdGetAsyncWithHttpInfo($transaction_id, string $contentType = self::contentTypes['vouchersPurchasesTransactionIdGet'][0])
    {
        $returnType = '\Zendit\Model\DtoVoucherPurchase';
        $request = $this->vouchersPurchasesTransactionIdGetRequest($transaction_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'vouchersPurchasesTransactionIdGet'
     *
     * @param  string $transaction_id transaction id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['vouchersPurchasesTransactionIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function vouchersPurchasesTransactionIdGetRequest($transaction_id, string $contentType = self::contentTypes['vouchersPurchasesTransactionIdGet'][0])
    {

        // verify the required parameter 'transaction_id' is set
        if ($transaction_id === null || (is_array($transaction_id) && count($transaction_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $transaction_id when calling vouchersPurchasesTransactionIdGet'
            );
        }


        $resourcePath = '/vouchers/purchases/{transactionId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($transaction_id !== null) {
            $resourcePath = str_replace(
                '{' . 'transactionId' . '}',
                ObjectSerializer::toPathValue($transaction_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['*/*', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
