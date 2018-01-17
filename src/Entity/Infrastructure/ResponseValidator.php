<?php

namespace Webit\WFirmaSDK\Entity\Infrastructure;

use Webit\WFirmaSDK\Entity\Exception\AccessDenied;
use Webit\WFirmaSDK\Entity\Exception\ActionNotFound;
use Webit\WFirmaSDK\Entity\Exception\AuthException;
use Webit\WFirmaSDK\Entity\Exception\AuthFailedLimitWait5MinutesException;
use Webit\WFirmaSDK\Entity\Exception\CompanyIdRequiredException;
use Webit\WFirmaSDK\Entity\Exception\DeniedScopeRequested;
use Webit\WFirmaSDK\Entity\Exception\FatalException;
use Webit\WFirmaSDK\Entity\Exception\InputErrorException;
use Webit\WFirmaSDK\Entity\Exception\NotFoundException;
use Webit\WFirmaSDK\Entity\Exception\OutOfServiceException;
use Webit\WFirmaSDK\Entity\Exception\SnapshotLockException;
use Webit\WFirmaSDK\Entity\Exception\TotalRequestsLimitExceededException;
use Webit\WFirmaSDK\Entity\Exception\ValidationException;
use Webit\WFirmaSDK\Entity\Request;
use Webit\WFirmaSDK\Entity\Response;
use Webit\WFirmaSDK\Entity\StatusCode;

class ResponseValidator
{
    public function validate(Request $request, Response $response)
    {
        switch ($response->status()->code()) {
            case StatusCode::error():
                throw ValidationException::create($request, $response);
            case StatusCode::accessDenied():
                throw AccessDenied::create($request, $response);
            case StatusCode::actionNotFound():
                throw ActionNotFound::create($request, $response);
            case StatusCode::auth():
                throw AuthException::create($request, $response);
            case StatusCode::authFailedLimitWait5Minutes():
                throw AuthFailedLimitWait5MinutesException::create($request, $response);
            case StatusCode::companyIdRequired():
                throw CompanyIdRequiredException::create($request, $response);
            case StatusCode::deniedScopeRequested():
                throw DeniedScopeRequested::create($request, $response);
            case StatusCode::fatal():
                throw FatalException::create($request, $response);
            case StatusCode::inputError():
                throw InputErrorException::create($request, $response);
            case StatusCode::notFound():
            case StatusCode::notFoundBogus():
                throw NotFoundException::create($request, $response);
            case StatusCode::outOfService():
                throw OutOfServiceException::create($request, $response);
            case StatusCode::snapshotLock():
                throw SnapshotLockException::create($request, $response);
            case StatusCode::totalExecutionTimeLimitExceeded():
                throw TotalRequestsLimitExceededException::create($request, $response);
            case StatusCode::totalRequestsLimitExceeded():
                throw TotalRequestsLimitExceededException::create($request, $response);
        }
    }
}
