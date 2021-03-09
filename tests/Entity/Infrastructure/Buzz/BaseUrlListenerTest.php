<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Message\Request;
use Webit\WFirmaSDK\AbstractTestCase;

class BaseUrlListenerTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function it_sets_host_on_request()
    {
        $listener = new BaseUrlListener($baseUrl = $this->faker()->url);
        $listener->preSend($request = new Request());

        $this->assertEquals($baseUrl, $request->getHost());
    }

    /**
     * @test
     */
    public function it_sets_wfirma_host_by_default()
    {
        $listener = new BaseUrlListener();
        $listener->preSend($request = new Request());

        $this->assertEquals('https://api2.wfirma.pl', $request->getHost());
    }
}
