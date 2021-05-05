<?php

namespace CodelyTv\OpenFlight\Users\Application;

use CodelyTv\OpenFlight\Users\Domain\User;
use CodelyTv\OpenFlight\Users\Domain\UserRepository;

class UserLogin
{
    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(string $username): User
    {
        return $this->repository->Find($username);
    }
}
