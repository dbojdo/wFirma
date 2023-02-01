<?php

namespace Webit\WFirmaSDK\Entity;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Webit\WFirmaSDK\AbstractTestCase;
use Webit\WFirmaSDK\Auth\ApiKeysAuth;
use Webit\WFirmaSDK\Auth\BasicAuth;
use Webit\WFirmaSDK\Auth\CompanyId;
use Webit\WFirmaSDK\Entity\Infrastructure\Buzz\BuzzRequestExecutorFactory;
use Webit\WFirmaSDK\Invoices\InvoicesApi;
use Webit\WFirmaSDK\Payments\PaymentsApi;

abstract class AbstractApiTestCase extends AbstractTestCase
{
    /**
     * @return EntityApi
     */
    protected function entityApi()
    {
        try {
            $factory = new EntityApiFactory(
                new BuzzRequestExecutorFactory(
                    null,
                    null,
                    $this->logger((bool)getenv('debug_api_messages'))
                )
            );
        } catch (\Exception $e) {
            throw new \RuntimeException('Cannot create EntityApiFactory', 0, $e);
        }

        return $factory->create($this->basicAuth());
    }

    private function logger(bool $logMessages): LoggerInterface
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

    private function basicAuth(): BasicAuth
    {
        $username = getenv('wFirma.username');
        $password = getenv('wFirma.password');
        if (!($username && $password)) {
            $this->markTestSkipped('Set wFirma.username and wFirma.password in your phpunit.xml file.');
        }

        return new BasicAuth(getenv('wFirma.username'), getenv('wFirma.password'), $this->companyId());
    }

    private function apiKeysAuth(): ApiKeysAuth
    {
        $accessKey = getenv('wFirma.access_key');
        $secretKey = getenv('wFirma.secret_key');
        $appKey = getenv('wFirma.app_key');
        if (!($accessKey && $secretKey && $appKey)) {
            $this->markTestSkipped('Set wFirma.access_key, wFirma.secret_key and wFirma.app_key in your phpunit.xml file.');
        }

        return new ApiKeysAuth(getenv('wFirma.access_key'), getenv('wFirma.secret_key'), getenv('wFirma.app_key'), $this->companyId());
    }

    /**
     * @return null|int
     */
    private function companyId(): ?int
    {
        return (int)getenv('wFirma.company_id') ?? null;
    }

    protected function invoicesApi(): InvoicesApi
    {
        return new InvoicesApi($this->entityApi());
    }

    protected function paymentsApi(): PaymentsApi
    {
        return new PaymentsApi($this->entityApi());
    }
}
