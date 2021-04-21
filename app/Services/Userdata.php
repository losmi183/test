<?php

namespace App\Services;

class Userdata {

    public $username;
    public $email;
    public $role;
    public $logged = 0;

    public function __construct($username, $email, $role)
    {
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
        $this->logged = 1;
    }

}