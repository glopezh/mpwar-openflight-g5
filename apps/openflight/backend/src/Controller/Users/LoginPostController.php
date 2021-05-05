<?php
declare(strict_types=1);

namespace CodelyTv\Apps\OpenFlight\Backend\Controller\Users;

use CodelyTv\OpenFlight\Users\Application\UserLogin;
use CodelyTv\Shared\Domain\DomainError;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class LoginPostController
{
    public function __construct(private UserLogin $userLogin)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $user = $this->userLogin->__invoke($request->request->getAlpha('username'));
            if (strcmp($user->Username(), $request->request->getAlpha('username')) === 0 && strcmp($user->Password(), $request->request->getAlnum('password')) === 0)
                $jsonResponse = new JsonResponse("OK", Response::HTTP_ACCEPTED);
            else
                $jsonResponse = new JsonResponse("Incorrect credentials", Response::HTTP_ACCEPTED);
            return $jsonResponse;
        } catch (DomainError $e) {
            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
