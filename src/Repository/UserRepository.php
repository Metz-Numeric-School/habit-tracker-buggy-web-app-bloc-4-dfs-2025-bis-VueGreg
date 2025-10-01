<?php
namespace App\Repository;

use App\Entity\User;
use App\Utils\EntityMapper;
use Mns\Buggy\Core\AbstractRepository;

class UserRepository extends AbstractRepository
{
    public function findAll()
    {
        $users = $this->getConnection()->query("SELECT * FROM mns_user");
        return EntityMapper::mapCollection(User::class, $users->fetchAll());
    }

    public function find(int $id)
    {
        $user = $this->getConnection()->query("SELECT * FROM mns_user WHERE id = $id");
        return EntityMapper::map(User::class, $user);
    }

    public function findByEmail(string $email)
    {
        $sql = "SELECT * FROM mns_user WHERE email = '$email'";
        $query = $this->getConnection()->query($sql);
        return EntityMapper::map(User::class, $query->fetch());
    }

    public function insert(array $data = array())
    {
        $query= $this->getConnection()->prepare("INSERT INTO `mns_user` (lastname, firstname, email, password, isadmin) VALUES (?,?,?, ?, ?)");

        $email = $data["email"];
        $password = PASSWORD_HASH($_POST["password"], PASSWORD_DEFAULT);
        $lastname = $data["lastname"];
        $firsname = $data["firstname"];
        $isAdmin = $data["isAdmin"];

        $query->bind_param($lastname,$firsname, $email, $password, $isAdmin);
        $query->execute($data);
        return $this->getConnection()->lastInsertId();
    }
}