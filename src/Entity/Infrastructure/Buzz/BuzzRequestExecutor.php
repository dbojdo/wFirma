<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Browser;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Webit\WFirmaSDK\Entity\Exception\ApiCallExecutionException;
use Webit\WFirmaSDK\Entity\Infrastructure\RequestExecutor;
use Webit\WFirmaSDK\Entity\Infrastructure\ResponseValidator;
use Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\ApiSerialiser;
use Webit\WFirmaSDK\Entity\Request;

final class BuzzRequestExecutor implements RequestExecutor
{
    /** @var Browser */
    private $browser;

    /** @var ApiSerialiser */
    private $serialiser;

    /** @var ResponseValidator */
    private $responseValidator;
    /**
     * @var null|LoggerInterface
     */
    private $logger;

    /**
     * @param Browser $browser
     * @param ApiSerialiser $serialiser
     * @param LoggerInterface|null $logger
     */
    public function __construct(Browser $browser, ApiSerialiser $serialiser, LoggerInterface $logger = null)
    {
        $this->browser = $browser;
        $this->serialiser = $serialiser;
        $this->responseValidator = new ResponseValidator();
        $this->logger = $logger ?: new NullLogger();
    }

    /**
     * @inheritdoc
     */
    public function execute(Request $request)
    {
        try {
            $input = (string)$this->serialiser->serialise($request);

            $this->logger->debug(
                $input,
                array(
                    'request' => $request->requestUrl()
                )
            );

            /** @var ResponseInterface $response */
            $response = $this->browser->post(
                $url = $request->requestUrl(),
                array(),
                $input
            );
        } catch (\Exception $e) {
            throw ApiCallExecutionException::create($request, null, $e);
        }

        $this->logger->debug(
            (string)$response->getBody(),
            array(
                'response' => $request->requestUrl()
            )
        );

        $this->responseValidator->validate(
            $request,
            $apiResponse = $this->serialiser->deserialise((string)$response->getBody(), $request)
        );

        return $apiResponse;
    }
}
