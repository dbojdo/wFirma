<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Nyholm\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Webit\WFirmaSDK\AbstractTestCase;

class BaseUrlMiddlewareTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function it_sets_host_on_request()
    {
        $listener = new BaseUrlMiddleware($baseUrl = $this->faker()->url);

        /** @var RequestInterface $newRequest */
        $newRequest = $listener->handleRequest(
            new Request('GET', $path = '/some-uri?query=xyz'),
            function ($r) {return $r;}
        );

        $this->assertEquals($baseUrl . $path, (string)$newRequest->getUri());
    }

    /**
     * @test
     */
    public function it_sets_wfirma_host_by_default()
    {
        $listener = new BaseUrlMiddleware();
        /** @var RequestInterface $newRequest */
        $newRequest = $listener->handleRequest(new Request('GET', $path = '/some-uri?query=xyz'), function ($r) {return $r;});

        $this->assertEquals('https://api2.wfirma.pl'.$path, (string)$newRequest->getUri());
    }
}
