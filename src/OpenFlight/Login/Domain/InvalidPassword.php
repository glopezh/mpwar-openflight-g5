<?php

declare(strict_types=1);

namespace CodelyTv\OpenFlight\Login\Domain;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Shared\Domain\DomainError;

final class InvalidPassword extends DomainError
{
    public function __construct(private string $password)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'invalid_name';
    }

    protected function errorMessage(): string
    {
        return sprintf('The password provided <%s> is invalid. It should contain one capital letter and one number ', $this->password);
    }
}
