<?php

namespace App\Models;

use App\Database\Database;
use App\Services\Userdata;

class User extends Database {

    public function login($email, $password)  {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        // If user with email found
        if($user) 
        {            
            if(password_verify($password, $user->password))
            {
                // If passwords match create new Userdata
                $userdata = new Userdata($user->username, $user->email, $user->role);
                return $userdata;
            }
            // Return wrong password
            else {
                return 0;
            }
        }
        else 
        {
            return 0;
        }


    }


}