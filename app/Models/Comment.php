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
    protected function all() 
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
    protected function findByProduct($product_id) 
    {        
        $stmt = $this->db->prepare("SELECT * FROM comments WHERE product_id=:product_id AND approved = 1");
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
    protected function create($product_id, $name, $email, $text)
    {
        $stmt = $this->db->prepare("INSERT INTO comments (product_id, name,email,text) VALUES (:product_id, :name,:email,:text)");
        $result = $stmt->execute([':product_id' => $product_id, ':name' => $name, ':email' => $email, ':text' => $text]);
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
    protected function delete($ids)
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


    /*
    *
    * Approve comment
    * 
    */
    protected function approve($id, $approved)
    {
        $stmt = $this->db->prepare("UPDATE comments SET approved=:approved WHERE id=:id");
        $result = $stmt->execute(['approved' => $approved, 'id' =>$id]);
        return $result;        
    }



} 