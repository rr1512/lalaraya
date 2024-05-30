<?php
/**
 * DimensionsApi
 * PHP version 7.2
 *
 * @category Class
 * @package  MuxPhp
 * @author   Mux API team
 * @link     https://docs.mux.com
 */

/**
 * Mux API
 *
 * Mux is how developers build online video. This API encompasses both Mux Video and Mux Data functionality to help you build your video-related projects better and faster than ever before.
 *
 * The version of the OpenAPI document: v1
 * Contact: devex@mux.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace MuxPhp\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use MuxPhp\ApiException;
use MuxPhp\Configuration;
use MuxPhp\HeaderSelector;
use MuxPhp\ObjectSerializer;

/**
 * DimensionsApi Class Doc Comment
 *
 * @category Class
 * @package  MuxPhp
 * @author   Mux API team
 * @link     https://docs.mux.com
 */
class DimensionsApi
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
    public function setHostIndex($hostIndex)
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
     * Operation listDimensionValues
     *
     * Lists the values for a specific dimension
     *
     * @param  string $dimension_id ID of the Dimension (required)
     * @param  int $limit Number of items to include in the response (optional, default to 25)
     * @param  int $page Offset by this many pages, of the size of &#x60;limit&#x60; (optional, default to 1)
     * @param  string[] $filters Limit the results to rows that match conditions from provided key:value pairs. Must be provided as an array query string parameter.  To exclude rows that match a certain condition, prepend a &#x60;!&#x60; character to the dimension.  Possible filter names are the same as returned by the List Filters endpoint.  Example:    * &#x60;filters[]&#x3D;operating_system:windows&amp;filters[]&#x3D;!country:US&#x60; (optional)
     * @param  string[] $metric_filters Limit the results to rows that match inequality conditions from provided metric comparison clauses. Must be provided as an array query string parameter.  Possible filterable metrics are the same as the set of metric ids, with the exceptions of &#x60;exits_before_video_start&#x60;, &#x60;unique_viewers&#x60;, &#x60;video_startup_failure_percentage&#x60;, and &#x60;views&#x60;.  Example:    * &#x60;metric_filters[]&#x3D;aggregate_startup_time&gt;&#x3D;1000&#x60; (optional)
     * @param  string[] $timeframe Timeframe window to limit results by. Must be provided as an array query string parameter (e.g. timeframe[]&#x3D;).  Accepted formats are...    * array of epoch timestamps e.g. &#x60;timeframe[]&#x3D;1498867200&amp;timeframe[]&#x3D;1498953600&#x60;   * duration string e.g. &#x60;timeframe[]&#x3D;24:hours or timeframe[]&#x3D;7:days&#x60; (optional)
     *
     * @throws \MuxPhp\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \MuxPhp\Models\ListDimensionValuesResponse
     */
    public function listDimensionValues($dimension_id, $limit = 25, $page = 1, $filters = null, $metric_filters = null, $timeframe = null)
    {
        list($response) = $this->listDimensionValuesWithHttpInfo($dimension_id, $limit, $page, $filters, $metric_filters, $timeframe);
        return $response;
    }

    /**
     * Operation listDimensionValuesWithHttpInfo
     *
     * Lists the values for a specific dimension
     *
     * @param  string $dimension_id ID of the Dimension (required)
     * @param  int $limit Number of items to include in the response (optional, default to 25)
     * @param  int $page Offset by this many pages, of the size of &#x60;limit&#x60; (optional, default to 1)
     * @param  string[] $filters Limit the results to rows that match conditions from provided key:value pairs. Must be provided as an array query string parameter.  To exclude rows that match a certain condition, prepend a &#x60;!&#x60; character to the dimension.  Possible filter names are the same as returned by the List Filters endpoint.  Example:    * &#x60;filters[]&#x3D;operating_system:windows&amp;filters[]&#x3D;!country:US&#x60; (optional)
     * @param  string[] $metric_filters Limit the results to rows that match inequality conditions from provided metric comparison clauses. Must be provided as an array query string parameter.  Possible filterable metrics are the same as the set of metric ids, with the exceptions of &#x60;exits_before_video_start&#x60;, &#x60;unique_viewers&#x60;, &#x60;video_startup_failure_percentage&#x60;, and &#x60;views&#x60;.  Example:    * &#x60;metric_filters[]&#x3D;aggregate_startup_time&gt;&#x3D;1000&#x60; (optional)
     * @param  string[] $timeframe Timeframe window to limit results by. Must be provided as an array query string parameter (e.g. timeframe[]&#x3D;).  Accepted formats are...    * array of epoch timestamps e.g. &#x60;timeframe[]&#x3D;1498867200&amp;timeframe[]&#x3D;1498953600&#x60;   * duration string e.g. &#x60;timeframe[]&#x3D;24:hours or timeframe[]&#x3D;7:days&#x60; (optional)
     *
     * @throws \MuxPhp\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \MuxPhp\Models\ListDimensionValuesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listDimensionValuesWithHttpInfo($dimension_id, $limit = 25, $page = 1, $filters = null, $metric_filters = null, $timeframe = null)
    {
        $request = $this->listDimensionValuesRequest($dimension_id, $limit, $page, $filters, $metric_filters, $timeframe);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\MuxPhp\Models\ListDimensionValuesResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MuxPhp\Models\ListDimensionValuesResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\MuxPhp\Models\ListDimensionValuesResponse';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = (string) $responseBody;
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
                        '\MuxPhp\Models\ListDimensionValuesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listDimensionValuesAsync
     *
     * Lists the values for a specific dimension
     *
     * @param  string $dimension_id ID of the Dimension (required)
     * @param  int $limit Number of items to include in the response (optional, default to 25)
     * @param  int $page Offset by this many pages, of the size of &#x60;limit&#x60; (optional, default to 1)
     * @param  string[] $filters Limit the results to rows that match conditions from provided key:value pairs. Must be provided as an array query string parameter.  To exclude rows that match a certain condition, prepend a &#x60;!&#x60; character to the dimension.  Possible filter names are the same as returned by the List Filters endpoint.  Example:    * &#x60;filters[]&#x3D;operating_system:windows&amp;filters[]&#x3D;!country:US&#x60; (optional)
     * @param  string[] $metric_filters Limit the results to rows that match inequality conditions from provided metric comparison clauses. Must be provided as an array query string parameter.  Possible filterable metrics are the same as the set of metric ids, with the exceptions of &#x60;exits_before_video_start&#x60;, &#x60;unique_viewers&#x60;, &#x60;video_startup_failure_percentage&#x60;, and &#x60;views&#x60;.  Example:    * &#x60;metric_filters[]&#x3D;aggregate_startup_time&gt;&#x3D;1000&#x60; (optional)
     * @param  string[] $timeframe Timeframe window to limit results by. Must be provided as an array query string parameter (e.g. timeframe[]&#x3D;).  Accepted formats are...    * array of epoch timestamps e.g. &#x60;timeframe[]&#x3D;1498867200&amp;timeframe[]&#x3D;1498953600&#x60;   * duration string e.g. &#x60;timeframe[]&#x3D;24:hours or timeframe[]&#x3D;7:days&#x60; (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listDimensionValuesAsync($dimension_id, $limit = 25, $page = 1, $filters = null, $metric_filters = null, $timeframe = null)
    {
        return $this->listDimensionValuesAsyncWithHttpInfo($dimension_id, $limit, $page, $filters, $metric_filters, $timeframe)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listDimensionValuesAsyncWithHttpInfo
     *
     * Lists the values for a specific dimension
     *
     * @param  string $dimension_id ID of the Dimension (required)
     * @param  int $limit Number of items to include in the response (optional, default to 25)
     * @param  int $page Offset by this many pages, of the size of &#x60;limit&#x60; (optional, default to 1)
     * @param  string[] $filters Limit the results to rows that match conditions from provided key:value pairs. Must be provided as an array query string parameter.  To exclude rows that match a certain condition, prepend a &#x60;!&#x60; character to the dimension.  Possible filter names are the same as returned by the List Filters endpoint.  Example:    * &#x60;filters[]&#x3D;operating_system:windows&amp;filters[]&#x3D;!country:US&#x60; (optional)
     * @param  string[] $metric_filters Limit the results to rows that match inequality conditions from provided metric comparison clauses. Must be provided as an array query string parameter.  Possible filterable metrics are the same as the set of metric ids, with the exceptions of &#x60;exits_before_video_start&#x60;, &#x60;unique_viewers&#x60;, &#x60;video_startup_failure_percentage&#x60;, and &#x60;views&#x60;.  Example:    * &#x60;metric_filters[]&#x3D;aggregate_startup_time&gt;&#x3D;1000&#x60; (optional)
     * @param  string[] $timeframe Timeframe window to limit results by. Must be provided as an array query string parameter (e.g. timeframe[]&#x3D;).  Accepted formats are...    * array of epoch timestamps e.g. &#x60;timeframe[]&#x3D;1498867200&amp;timeframe[]&#x3D;1498953600&#x60;   * duration string e.g. &#x60;timeframe[]&#x3D;24:hours or timeframe[]&#x3D;7:days&#x60; (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listDimensionValuesAsyncWithHttpInfo($dimension_id, $limit = 25, $page = 1, $filters = null, $metric_filters = null, $timeframe = null)
    {
        $returnType = '\MuxPhp\Models\ListDimensionValuesResponse';
        $request = $this->listDimensionValuesRequest($dimension_id, $limit, $page, $filters, $metric_filters, $timeframe);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'listDimensionValues'
     *
     * @param  string $dimension_id ID of the Dimension (required)
     * @param  int $limit Number of items to include in the response (optional, default to 25)
     * @param  int $page Offset by this many pages, of the size of &#x60;limit&#x60; (optional, default to 1)
     * @param  string[] $filters Limit the results to rows that match conditions from provided key:value pairs. Must be provided as an array query string parameter.  To exclude rows that match a certain condition, prepend a &#x60;!&#x60; character to the dimension.  Possible filter names are the same as returned by the List Filters endpoint.  Example:    * &#x60;filters[]&#x3D;operating_system:windows&amp;filters[]&#x3D;!country:US&#x60; (optional)
     * @param  string[] $metric_filters Limit the results to rows that match inequality conditions from provided metric comparison clauses. Must be provided as an array query string parameter.  Possible filterable metrics are the same as the set of metric ids, with the exceptions of &#x60;exits_before_video_start&#x60;, &#x60;unique_viewers&#x60;, &#x60;video_startup_failure_percentage&#x60;, and &#x60;views&#x60;.  Example:    * &#x60;metric_filters[]&#x3D;aggregate_startup_time&gt;&#x3D;1000&#x60; (optional)
     * @param  string[] $timeframe Timeframe window to limit results by. Must be provided as an array query string parameter (e.g. timeframe[]&#x3D;).  Accepted formats are...    * array of epoch timestamps e.g. &#x60;timeframe[]&#x3D;1498867200&amp;timeframe[]&#x3D;1498953600&#x60;   * duration string e.g. &#x60;timeframe[]&#x3D;24:hours or timeframe[]&#x3D;7:days&#x60; (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listDimensionValuesRequest($dimension_id, $limit = 25, $page = 1, $filters = null, $metric_filters = null, $timeframe = null)
    {
        // verify the required parameter 'dimension_id' is set
        if ($dimension_id === null || (is_array($dimension_id) && count($dimension_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dimension_id when calling listDimensionValues'
            );
        }

        $resourcePath = '/data/v1/dimensions/{DIMENSION_ID}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($limit !== null) {
            if('form' === 'form' && is_array($limit)) {
                foreach($limit as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['limit'] = $limit;
            }
        }
        // query params
        if ($page !== null) {
            if('form' === 'form' && is_array($page)) {
                foreach($page as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['page'] = $page;
            }
        }
        // query params
        if ($filters !== null) {
            if('form' === 'form' && is_array($filters)) {
                foreach($filters as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['filters[]'] = $filters;
            }
        }
        // query params
        if ($metric_filters !== null) {
            if('form' === 'form' && is_array($metric_filters)) {
                foreach($metric_filters as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['metric_filters[]'] = $metric_filters;
            }
        }
        // query params
        if ($timeframe !== null) {
            if('form' === 'form' && is_array($timeframe)) {
                foreach($timeframe as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['timeframe[]'] = $timeframe;
            }
        }


        // path params
        if ($dimension_id !== null) {
            $resourcePath = str_replace(
                '{' . 'DIMENSION_ID' . '}',
                ObjectSerializer::toPathValue($dimension_id),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

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

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if (!empty($this->config->getUsername()) || !(empty($this->config->getPassword()))) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
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


        // MUX: adds support for array params.
        // TODO: future upstream?
        $query = ObjectSerializer::buildBetterQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listDimensions
     *
     * List Dimensions
     *
     *
     * @throws \MuxPhp\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \MuxPhp\Models\ListDimensionsResponse
     */
    public function listDimensions()
    {
        list($response) = $this->listDimensionsWithHttpInfo();
        return $response;
    }

    /**
     * Operation listDimensionsWithHttpInfo
     *
     * List Dimensions
     *
     *
     * @throws \MuxPhp\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \MuxPhp\Models\ListDimensionsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listDimensionsWithHttpInfo()
    {
        $request = $this->listDimensionsRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\MuxPhp\Models\ListDimensionsResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MuxPhp\Models\ListDimensionsResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\MuxPhp\Models\ListDimensionsResponse';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = (string) $responseBody;
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
                        '\MuxPhp\Models\ListDimensionsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listDimensionsAsync
     *
     * List Dimensions
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listDimensionsAsync()
    {
        return $this->listDimensionsAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listDimensionsAsyncWithHttpInfo
     *
     * List Dimensions
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listDimensionsAsyncWithHttpInfo()
    {
        $returnType = '\MuxPhp\Models\ListDimensionsResponse';
        $request = $this->listDimensionsRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'listDimensions'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listDimensionsRequest()
    {

        $resourcePath = '/data/v1/dimensions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

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

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if (!empty($this->config->getUsername()) || !(empty($this->config->getPassword()))) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
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


        // MUX: adds support for array params.
        // TODO: future upstream?
        $query = ObjectSerializer::buildBetterQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
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