<?php

namespace App\Models;

use App\Database\Database;

class Comment extends Database {
     
    /** 
    * Fetch all resources
    *
    * @params void
    * @return array
    */
    public function all() 
    { 
        $stmt = $this->db->prepare("SELECT * FROM comments");
        $stmt->execute();
        return $stmt->fetchAll();    
    }
     
    /** 
    *
    * Fetch resourse by product_id
    *
    * @params int $product_id
    * @return object
    *
    */
    public function findByProduct($product_id) 
    {        
        $stmt = $this->db->prepare("SELECT * FROM comments WHERE product_id=:product_id");
        $stmt->bindValue(':product_id', $product_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    

    /*
    *
    * Create new resorce
    *
    * @params string $title, string $description, string $image 
    * @return bool
    *
    */
    public function create($name, $email, $text)
    {
        $stmt = $this->db->prepare("INSERT INTO comments (name,email,text) VALUES (:name,:email,:text)");
        $result = $stmt->execute([':name' => $name, ':email' => $email, ':text' => $text]);
        return $result;  
    }

   
  
    /*
    *
    * Delete single id OR array of ids
    *
    * @param int $id OR array of int $ids
    * @return bool
    *
    */
    public function delete($ids)
    {
        if(is_array($ids)) {
            $result;
            foreach ($ids as $id) {            
                $stmt = $this->db->prepare("DELETE FROM fruits WHERE id=:id");
                $result = $stmt->execute(['id' => $id]);
            }
            return $result;
        }
        else {
            $stmt = $this->db->prepare("DELETE FROM fruits WHERE id=:id");
            $result = $stmt->execute(['id' => $ids]);
            return $result;        
        }
    }


} 