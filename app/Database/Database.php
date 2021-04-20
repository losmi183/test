<?php

namespace App\Database;

use PDO;

class Database 
{
    protected $db;

    public function __construct()
    {        
        try {
            // include "db.php";
            $db = new PDO('mysql:host=localhost;dbname=citrus;charset=utf8mb4', 'root', '');
            // Recomended error mode, throws PDOException, 
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Turn of always, using only in older Mysql versions, in PDO always off
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            // Set Default Fetch mode to object
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            $this->db = $db;
        } 
        catch (PDOException $e) {
            echo "Connection Error: ". $e->getMessage();
        }
    }
}