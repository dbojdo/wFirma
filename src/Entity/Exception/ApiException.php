<?php

namespace Webit\WFirmaSDK\Entity\Exception;

use Webit\WFirmaSDK\Entity\Request;
use Webit\WFirmaSDK\Entity\Response;

abstract class ApiException extends \RuntimeException
{
    /**
     * @var Response
     */
    private $apiResponse;

    /**
     * @var Request
     */
    private $apiRequest;

    public static function create(Request $request, Response $response = null, \Exception $previous = null)
    {
        $exception = new static(
            static::message($request, $response),
            0,
            $previous
        );

        $exception->apiResponse = $response;
        $exception->apiRequest = $request;

        return $exception;
    }

    /**
     * @return Response
     */
    public function apiResponse()
    {
        return $this->apiResponse;
    }

    /**
     * @return Request
     */
    public function apiRequest()
    {
        return $this->apiRequest;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return string
     */
    abstract protected static function message(Request $request, Response $response = null);
}