<?php

namespace App\Models;

use App\Database\Database;

class Fruit extends Database {

    public $username;
    public $email;
    public $password;
    public $role;
    public $logged = false;

    public function login($email, $password  {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }


}