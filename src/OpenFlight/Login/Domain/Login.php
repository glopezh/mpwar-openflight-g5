<?php


namespace CodelyTv\OpenFlight\Login\Domain;


use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class Login extends AggregateRoot
{
    const pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
    private Uuid $id;
    private string $username;
    private string $password;
    public function __construct(Uuid $id,string $username, string $password)
    {
        $this->id =$id;
        $this->username =$username;
        $this->password =$password;
    }

    public function ID(): Uuid
    {
        return $this->id;
    }

    public function Username(): string
    {
        return $this->username;
    }

    public function Password(): string
    {
        return $this->password;
    }

    public static function LoginUser(Uuid $id, string $username, string $password): Login
    {
        self::validateUserame($username);
        self::validatePassword($password);
        return new self($id, $username, $password);
    }

    private static function validateUserame(string $username): void
    {
        if ($username == "") {
            throw new EmptyUsername();
        }
    }

    public static function validatePassword(string $password): void
    {
        if (!preg_match(self::pattern, $password)) {
            throw new InvalidPassword($password);
        }
    }
}