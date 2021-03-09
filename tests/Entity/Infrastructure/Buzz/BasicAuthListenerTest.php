<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Message\Request;
use Webit\WFirmaSDK\AbstractTestCase;
use Webit\WFirmaSDK\Auth\BasicAuth;

class BasicAuthListenerTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function it_sets_authorisation_header()
    {
        $auth = new BasicAuth($this->faker()->email, $this->faker()->password);

        $listener = new BasicAuthListener($auth);
        $listener->preSend($request = new Request());

        list(, $expectedHeader) = explode(': ', $auth->toHttpHeader());
        $this->assertEquals(
            $expectedHeader,
            $request->getHeader('AUTHORIZATION')
        );
    }
}
