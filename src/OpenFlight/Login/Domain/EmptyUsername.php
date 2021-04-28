<?php

declare(strict_types=1);

namespace CodelyTv\OpenFlight\Login\Domain;

use CodelyTv\Shared\Domain\DomainError;

final class EmptyUsername extends DomainError
{
    public function __construct()
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'invalid_username';
    }

    protected function errorMessage(): string
    {
        return sprintf('The username provided is empty');
    }
}
