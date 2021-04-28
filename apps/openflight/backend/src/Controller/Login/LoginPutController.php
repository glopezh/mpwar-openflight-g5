<?php
declare(strict_types=1);


namespace CodelyTv\Apps\OpenFlight\Backend\Controller\Login;


use CodelyTv\OpenFlight\Login\Application\LoginUser;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class LoginPutController
{
    public function __construct(private LoginUser $loginUser)
    {
    }

    public function __invoke(string $id, Request $request): JsonResponse
    {
        try {
            //var_dump($request->request->getAlpha('username'));exit;
            $this->loginUser->__invoke(
                $id,
                $request->request->getAlpha('username'),
                $request->request->get('password')
            );
            return new JsonResponse("OK", Response::HTTP_CREATED);
        } catch (DomainError $e) {
            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

}
