<?php
class UserModel{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    public function insertUser($name, $lastname, $email, $password){
        $insert = $this->db->prepare("INSERT INTO personne(nom, prenom, email, password) VALUES(?, ?, ?, ?)");
        return $insert->execute(array($name, $lastname, $email, $password));
    }
    public function getUser($email, $password){
        $req = $this->db->query("SELECT * FROM personne WHERE email='$email' AND password='$password'");
        return $req->fetch(PDO::FETCH_OBJ);
    }
    public function getAlluser(){
        $req = $this->db->query("SELECT * FROM personne");
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    public function delUser($id){
        $req = $this->db->prepare("DELETE FROM personne WHERE id='$id'");
        return $req->execute();
    }
    public function updateUser($id, $name, $lastname, $email, $password){
        $req = $this->db->prepare("UPDATE personne SET nom='$name', prenom='$lastname', email='$email', password='$password' WHERE id='$id'");
        return $req->execute();
    }
    public function emailDefined(){
        $req = $this->db->query("SELECT email FROM personne");
        $select = $req->fetchAll(PDO::FETCH_OBJ);
        return $select;
    }
}

?>