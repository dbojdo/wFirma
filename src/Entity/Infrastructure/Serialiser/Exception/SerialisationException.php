<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure\Serialiser\Exception;

use Webit\WFirmaSDK\Entity\Request;

class SerialisationException extends ApiSerialiserException
{
    /** @var Request */
    private $request;

    /**
     * @param Request $request
     * @param int $code
     * @param \Exception|null $previous
     * @return SerialisationException
     */
    public static function createForRequest(Request $request, $code = 0, \Exception $previous = null)
    {
        $e = new self('Error during Request serialisation', $code, $previous);
        $e->request = $request;

        return $e;
    }

    /**
     * @return Request
     */
    public function request()
    {
        return $this->request;
    }
}