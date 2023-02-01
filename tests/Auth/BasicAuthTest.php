<?php

namespace Webit\WFirmaSDK\Auth;

use Webit\WFirmaSDK\AbstractTestCase;

class BasicAuthTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function it_keeps_username_password_and_company_id()
    {
        $auth = new BasicAuth(
            $user = $this->faker()->userName,
            $password = $this->faker()->password,
            $companyId = $this->faker()->randomNumber()
        );

        $this->assertEquals($user, $auth->username());
        $this->assertEquals($password, $auth->password());
        $this->assertEquals($companyId, $auth->companyId());
    }
}
