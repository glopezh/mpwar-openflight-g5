<?php
declare(strict_types=1);


namespace CodelyTv\Apps\OpenFlight\Backend\Controller\Users;


use CodelyTv\OpenFlight\Users\Application\UserRegistration;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class RegisterPutController
{
    public function __construct(private UserRegistration $userRegistration)
    {
    }

    public function __invoke(string $id, Request $request): JsonResponse
    {
        try {
            $this->userRegistration->__invoke(
                $id,
                $request->request->getAlpha('username'),
                $request->request->getAlpha('name'),
                $request->request->getAlpha('last_name'),
                $request->request->get('password')
            );
            return new JsonResponse("OK", Response::HTTP_CREATED);
        } catch (DomainError $e) {
            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

}