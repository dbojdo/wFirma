<?php

namespace Webit\WFirmaSDK\Auth;

use Webit\WFirmaSDK\AbstractTestCase;

class ApiKeysAuthTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function it_keeps_api_keys_and_company_id()
    {
        $auth = new ApiKeysAuth(
            $accessKey = $this->faker()->uuid,
            $secretKey = $this->faker()->uuid,
            $appKey = $this->faker()->uuid,
            $companyId = $this->faker()->randomNumber()
        );

        $this->assertEquals($accessKey, $auth->accessKey());
        $this->assertEquals($secretKey, $auth->secretKey());
        $this->assertEquals($appKey, $auth->appKey());
        $this->assertEquals($companyId, $auth->companyId());
    }
}
