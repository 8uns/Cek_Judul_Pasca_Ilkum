<?php

class Profil_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProfilAdmin($id)
    {
        $this->db->query("SELECT * FROM `administrators` WHERE administrator_id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function getProfil($id)
    {
        $this->db->query("SELECT * FROM `mhs` WHERE mhs_id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function getProfAdmin($id)
    {
        $this->db->query("SELECT * FROM `administrators` WHERE administrator_id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }



    public function ubahDataProfilAdmin($data, $id)
    {
        if ($data['password'] == '' || $data['password'] == null) {
            $query = "UPDATE `administrators` 
                    SET 
                    name=:name, 
                    username=:username
                    WHERE administrator_id=:administrator_id
                        ";
            $this->db->query($query);
        } else {
            $data['password'] = md5($data['password']);
            $query = "UPDATE `administrators` 
                    SET 
                    name=:name, 
                    username=:username, 
                    password=:password
                    WHERE administrator_id=:administrator_id
                        ";
            $this->db->query($query);
            $this->db->bind('password', $data['password']);
        }
        $this->db->bind('name', $data['name']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('administrator_id', $id);
        if ($this->db->execute()) {
            $_SESSION['name'] = $data['name'];
        }
        return $this->db->rowCount();
    }
}
