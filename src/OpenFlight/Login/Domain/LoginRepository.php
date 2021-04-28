<?php


namespace CodelyTv\OpenFlight\Login\Domain;


use CodelyTv\Shared\Domain\ValueObject\Uuid;

interface LoginRepository
{
    public function Save(Login $login): void;
}