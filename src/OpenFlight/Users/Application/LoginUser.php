<?php


namespace CodelyTv\OpenFlight\Login\Application;

use CodelyTv\OpenFlight\Users\Domain\Users;
use CodelyTv\OpenFlight\Users\Domain\UserRepository;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class LoginUser
{

    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(string $username,string $password): void
    {
        /*$uuid = new Uuid($id);
        $login   = Login::LoginUser($uuid, $username, $password); //capa de dominioç//enticsdds
        $this->repository->Save($login);*/
    }
}