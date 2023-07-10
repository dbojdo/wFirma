<?php

namespace Webit\WFirmaSDK\Entity;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Webit\WFirmaSDK\AbstractTestCase;
use Webit\WFirmaSDK\Auth\ApiKeysAuth;
use Webit\WFirmaSDK\Entity\Infrastructure\Buzz\BrowserFactory;
use Webit\WFirmaSDK\Entity\Infrastructure\Buzz\BuzzRequestExecutorFactory;

abstract class AbstractApiTestCase extends AbstractTestCase
{
    /**
     * @return EntityApi
     */
    protected function entityApi()
    {
        $curlOptions = [];
        if (getenv('disable_ssl_check')) {
            $curlOptions = [CURLOPT_SSL_VERIFYHOST => false, CURLOPT_SSL_VERIFYPEER => false];
        }

        try {
            $factory = new EntityApiFactory(
                new BuzzRequestExecutorFactory(
                    new BrowserFactory(null, $curlOptions),
                    null,
                    $this->logger((bool)getenv('debug_api_messages'))
                )
            );
        } catch (\Exception $e) {
            throw new \RuntimeException('Cannot create EntityApiFactory', 0, $e);
        }

        return $factory->create($this->apiKeyAuth());
    }

    private function apiKeyAuth()
    {
        $accessKey = getenv('wFirma.access_key');
        $secretKey = getenv('wFirma.secret_key');
        $appKey = getenv('wFirma.app_key');
        if (!($accessKey && $secretKey && $appKey)) {
            $this->markTestSkipped('Set wFirma.access_key, wFirma.secret_key and wFirma.app_key in your phpunit.xml file.');
        }

        return new ApiKeysAuth($accessKey, $secretKey, $appKey);
    }

    /**
     * @param bool $logMessages
     * @return LoggerInterface
     */
    private function logger($logMessages)
    {
        if (!$logMessages) {
            return new NullLogger();
        }

        return new Logger(
            'API',
            array(
                new StreamHandler('php://stdout')
            )
        );
    }
}
