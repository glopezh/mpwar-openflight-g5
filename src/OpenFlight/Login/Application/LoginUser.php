<?php


namespace CodelyTv\OpenFlight\Login\Application;

use CodelyTv\OpenFlight\Users\Domain\User;
use CodelyTv\OpenFlight\Users\Domain\UserRepository;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class LoginUser
{

    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(string $id, string $username,string $password): void
    {
        $uuid = new Uuid($id);
        $user = User::LoginUser($uuid, $username, $password); //capa de dominio
        $this->repository->Save($user);
    }
}