<?php
include_once 'autoload.php';

class Repository
{
    public $bd;
    public $tableName;
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->bd = ConnexionBD::getInstance();
    }

    public function findAll() {
        $request = "select * from ".$this->tableName;
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
    public function findBycin($cin){
        $request = "select * from ".$this->tableName ." where cin = ?";
        $response =$this->bd->prepare($request);
        $response->execute([$cin]);
        return $response->fetch(PDO::FETCH_OBJ);
    }

    public function findByUsername($username) {
        $request = "select * from ".$this->tableName ." where username = ?";
        $response =$this->bd->prepare($request);
        $response->execute([$username]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
    public function findByDoubleId($id1,$id2) {
        $request = "select * from ".$this->tableName ." where username= ? and password=?";
        $response =$this->bd->prepare($request);
        $response->execute([$id1,$id2]);
        return $response->fetch(PDO::FETCH_OBJ);
    }

    public function addUser($val1,$val2){

       
        $request = "INSERT INTO ".$this->tableName. "(username,password) VALUES ('".$val1."','".$val2."')" ; 
        $response=$this->bd->prepare($request);
        $response->execute();
        return $response->fetch(PDO::FETCH_OBJ);
        
    }

    
    public function addPerson($val1,$val2,$val3,$val4,$val5,$val6){

       
        $request = "INSERT INTO ".$this->tableName. "(cin,firstname,lastname,section,age,image) VALUES ('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".addslashes ($val6)."')" ; 
        $response=$this->bd->prepare($request);
        $response->execute();
        return $response->fetch(PDO::FETCH_OBJ);
        
    }



    public function deleteByCin($id){

        $request="DELETE FROM " .$this->tableName." WHERE cin= ?";
        $response =$this->bd->prepare($request);
        $response->execute([$id]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
    public function updatePic($id1,$img,$id2){

        $request="UPDATE " .$this->tableName." SET ".$id1."='".addslashes($img)."' WHERE cin= ".$id2;
        $response =$this->bd->prepare($request);
        $response->execute();
        return $response->fetch(PDO::FETCH_OBJ);
    }
    
    public function update($id1,$id2,$id3){

        $request="UPDATE " .$this->tableName." SET ".$id1."='".$id2."' WHERE cin= ".$id3;
        $response =$this->bd->prepare($request);
        $response->execute();
        return $response->fetch(PDO::FETCH_OBJ);
    }


}





