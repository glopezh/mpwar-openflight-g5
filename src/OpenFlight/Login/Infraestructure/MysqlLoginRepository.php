<?php
declare(strict_types=1);


namespace CodelyTv\OpenFlight\Login\Infrastructure;


use CodelyTv\OpenFlight\Login\Domain\Login;
use CodelyTv\OpenFlight\Login\Domain\LoginRepository;
use CodelyTv\Shared\Domain\ValueObject\Uuid;
use CodelyTv\Shared\Infrastructure\Persistence\Mysql;
use function Symfony\Component\String\u;

final class MysqlLoginRepository implements LoginRepository
{
    public function __construct(private Mysql $mysql)
    {
    }

    public function Save(Login $login): void
    {
        $sql = 'INSERT INTO login VALUES(:id, :username,:password)';
        $statement = $this->mysql->PDO()->prepare($sql);
        $statement->bindValue(':id', $login->ID()->value());
        $statement->bindValue(':username', $login->Username());
        $statement->bindValue(':password', $login->Password());
        $statement->execute();
    }

}