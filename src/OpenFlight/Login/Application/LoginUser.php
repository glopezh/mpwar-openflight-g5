<?php


namespace CodelyTv\OpenFlight\Login\Application;

use CodelyTv\OpenFlight\Users\Domain\Login;
use CodelyTv\OpenFlight\Users\Domain\LoginRepository;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class LoginUser
{

    public function __construct(private LoginRepository $repository)
    {
    }

    public function __invoke(string $id, string $username,string $password): void
    {
        $uuid = new Uuid($id);
        $login   = Login::LoginUser($uuid, $username, $password); //capa de dominio
        $this->repository->Save($login);
    }
}