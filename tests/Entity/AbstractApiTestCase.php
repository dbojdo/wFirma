<?php

namespace Webit\WFirmaSDK\Entity;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Webit\WFirmaSDK\AbstractTestCase;
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
                    new Logger(
                        'API',
                        array(
                            new StreamHandler('php://stdout')
                        )
                    )
                )
            );
        } catch (\Exception $e) {
            throw new \RuntimeException('Cannot create EntityApiFactory', 0, $e);
        }

        return $factory->create($this->basicAuth());
    }

    private function basicAuth()
    {
        $auth = new BasicAuth(getenv('wFirma.username'), getenv('wFirma.password'), $this->companyId());
        if ($auth->isEmpty()) {
            $this->markTestSkipped('Set wFirma.username and wFirma.password in your phpunit.xml file.');
        }

        return $auth;
    }

    /**
     * @return null
     */
    private function companyId()
    {
        return getenv('wFirma.company_id') ?? null;
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
