<?php
declare(strict_types=1);

namespace CodelyTv\OpenFlight\Users\Domain;

use CodelyTv\Shared\Domain\DomainError;

final class UserDoesNotExists extends DomainError
{
    public function __construct()
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'user_does_not_exists';
    }

    protected function errorMessage(): string
    {
        return 'The user does not exists';
    }
}
