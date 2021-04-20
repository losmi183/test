<?php

namespace App\Models;

use App\Database\Database;

class Fruit extends Database {
     
    /** 
    * Fetch all resources
    *
    * @params void
    * @return array
    */
    protected function all() 
    { 
        $stmt = $this->db->prepare("SELECT * FROM fruits");
        $stmt->execute();
        return $stmt->fetchAll();    
    }


    /** 
    *
    * Fetch single resourse
    *
    * @params int $id
    * @return object
    *
    */
    protected function find($id) 
    {        
        $stmt = $this->db->prepare("SELECT * FROM fruits WHERE id=:id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    

    /*
    *
    * Create new resorce
    *
    * @params string $title, string $description, string $image 
    * @return bool
    *
    */
    protected function create($title, $description, $image)
    {
        $stmt = $this->db->prepare("INSERT INTO fruits (title,description,image) VALUES (:title,:description,:image)");
        $result = $stmt->execute([':title' => $title, ':description' => $description, ':image' => $image]);
        return $result;  
    }

   
    /*
    *
    * Update resorce
    *
    * @params int $id, string $title, string $description, string $image 
    * @return bool
    *
    */
    protected function update($id, $title, $description, $image)
    {
        $stmt = $this->db->prepare("UPDATE fruits SET title=:title, description=:description, image=:image WHERE id=:id");
        $result = $stmt->execute(['id' =>$id, ':title' => $title, ':description' => $description, ':image' => $image]);
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


} 