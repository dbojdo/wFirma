<?php

namespace Webit\WFirmaSDK\Entity;

final class StatusCode
{
    /** @var string */
    private $code;

    /**
     * @param string $code
     */
    private function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * @return StatusCode
     */
    public static function ok()
    {
        return new self('OK');
    }

    /**
     * @return StatusCode
     */
    public static function error()
    {
        return new self('ERROR');
    }

    /**
     * @return StatusCode
     */
    public static function actionNotFound()
    {
        return new self('ACTION NOT FOUND');
    }

    /**
     * @return StatusCode
     */
    public static function accessDenied()
    {
        return new self('ACCESS DENIED');
    }

    /**
     * @return StatusCode
     */
    public static function auth()
    {
        return new self('AUTH');
    }

    /**
     * @return StatusCode
     */
    public static function authFailedLimitWait5Minutes()
    {
        return new self('AUTH FAILED LIMIT WAIT 5 MINUTES');
    }

    /**
     * @return StatusCode
     */
    public static function companyIdRequired()
    {
        return new self('COMPANY ID REQUIRED');
    }

    /**
     * @return StatusCode
     */
    public static function deniedScopeRequested()
    {
        return new self('DENIED SCOPE REQUESTED');
    }

    /**
     * @return StatusCode
     */
    public static function fatal()
    {
        return new self('FATAL');
    }

    /**
     * @return StatusCode
     */
    public static function inputError()
    {
        return new self('INPUT ERROR');
    }

    /**
     * @return StatusCode
     */
    public static function notFound()
    {
        return new self('NOT FOUND');
    }

    /**
     * @return StatusCode
     */
    public static function notFoundBogus()
    {
        return new self('Nie znaleziono obiektu. Wybrany zasób nie istnieje lub został usunięty.');
    }

    /**
     * @return StatusCode
     */
    public static function outOfService()
    {
        return new self('OUT OF SERVICE');
    }

    /**
     * @return StatusCode
     */
    public static function snapshotLock()
    {
        return new self('SNAPSHOT LOCK');
    }

    /**
     * @return StatusCode
     */
    public static function totalRequestsLimitExceeded()
    {
        return new self('TOTAL REQUESTS LIMIT EXCEEDED');
    }

    /**
     * @return StatusCode
     */
    public static function totalExecutionTimeLimitExceeded()
    {
        return new self('TOTAL EXECUTION TIME LIMIT EXCEEDED');
    }

    /**
     * @param string $code
     * @return StatusCode
     * @internal
     */
    public static function fromString($code)
    {
        return new self($code);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->code;
    }
}
