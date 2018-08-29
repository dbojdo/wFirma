<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Buzz;

use Buzz\Message\Factory\Factory;
use GuzzleHttp\Psr7\Request;
use Webit\WFirmaSDK\AbstractTestCase;

class CompanyIdMiddlewareTest extends AbstractTestCase
{
    /**
     * @test
     * @dataProvider resources
     */
    public function it_adds_company_id_to_the_resource($resource, $companyId, $expectedResource)
    {
        $listener = new CompanyIdMiddleware($companyId);

        $newRequest = $listener->handleRequest(
            $request = new Request('POST', $resource), function ($r) {return $r;}
        );

        $this->assertEquals($expectedResource, (string)$newRequest->getUri());
    }

    public function resources()
    {
        return array(
            array(
                '/some/resource/without-query-string',
                $id = $this->faker()->randomNumber(),
                sprintf('/some/resource/without-query-string?company_id=%s', $id),
            ),
            array(
                '/some/resource/with-query-string?some=value',
                $id = $this->faker()->randomNumber(),
                sprintf('/some/resource/with-query-string?some=value&company_id=%s', $id),
            )
        );
    }
}
