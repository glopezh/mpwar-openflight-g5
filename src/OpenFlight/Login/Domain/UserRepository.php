<?php


namespace CodelyTv\OpenFlight\Login\Domain;


use CodelyTv\Shared\Domain\ValueObject\Uuid;

interface UserRepository
{
    public function Save(User $user): void;
}