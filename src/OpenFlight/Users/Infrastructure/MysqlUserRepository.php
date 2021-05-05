<?php
declare(strict_types=1);

namespace CodelyTv\OpenFlight\Users\Infrastructure;

use CodelyTv\OpenFlight\Users\Domain\User;
use CodelyTv\OpenFlight\Users\Domain\UserDoesNotExists;
use CodelyTv\OpenFlight\Users\Domain\UserRepository;
use CodelyTv\Shared\Domain\ValueObject\Uuid;
use CodelyTv\Shared\Infrastructure\Persistence\Mysql;
use PDO;

final class MysqlUserRepository implements UserRepository
{
    public function __construct(private Mysql $mysql)
    {
    }

    public function Save(User $user): void
    {
        $sql = 'INSERT INTO user VALUES(:id, :username, :name,:last_name, :password)';
        $statement = $this->mysql->PDO()->prepare($sql);
        $statement->bindValue(':id', $user->ID()->value());
        $statement->bindValue(':username', $user->Username());
        $statement->bindValue(':name', $user->Name());
        $statement->bindValue(':last_name', $user->LastName());
        $statement->bindValue(':password', $user->Password());
        $statement->execute();
    }

    public function Find(string $username): User
    {
        $sql = "SELECT * FROM user WHERE Username = '" . $username . "'";
        $statement = $this->mysql->PDO()->prepare($sql);
        //$statement->bindValue(':username', $username);
        $statement->execute();
        $resultUser = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$resultUser) throw new UserDoesNotExists();
        $uuid = new Uuid($resultUser['Id']);
        return new User($uuid, $resultUser['Username'], $resultUser['Name'], $resultUser['LastName'], $resultUser['Password']);
    }
}