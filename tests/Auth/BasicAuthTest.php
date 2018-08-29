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

    /**
     * @param BasicAuth $auth
     * @param bool $isEmpty
     * @dataProvider basicAuthEmpty
     */
    public function it_checks_if_is_empty(BasicAuth $auth, $isEmpty)
    {
        $this->assertEquals($isEmpty, $auth->isEmpty());
    }

    public function basicAuthEmpty()
    {
        return array(
            'empty user' => array(new BasicAuth($this->faker()->userName, ''), true),
            'empty password' => array(new BasicAuth('', $this->faker()->password), true),
            'non empty' => array(new BasicAuth('', $this->faker()->password), false)
        );
    }
}
