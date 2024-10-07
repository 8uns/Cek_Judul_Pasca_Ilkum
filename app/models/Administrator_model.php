<?php

class Administrator_model
{
    private $table = 'administrators';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllAdmin()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }
    public function tambahDataAdministrator($data)
    {
        $data['password'] = md5($data['password']);
        $query = "INSERT INTO " . $this->table . " 
                    (name, username, levels, password) 
                        VALUES
                        (:name, :username, :level, :password)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('level', $data['level']);
        $this->db->bind('password', $data['password']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getAdministratorById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE administrator_id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function ubahDataAdministrator($data, $id)
    {
        if ($data['password'] == '' || $data['password'] == null) {
            $query = "UPDATE " . $this->table . " 
                    SET 
                    name=:name, 
                    username=:username
                    WHERE administrator_id=:administrator_id
                        ";
            $this->db->query($query);
        } else {
            $data['password'] = md5($data['password']);
            $query = "UPDATE " . $this->table . " 
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

        $this->db->execute();
        $_SESSION['name'] = $data['name'];

        return $this->db->rowCount();
    }

    public function hapusDataAdministrator($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE administrator_id=:administrator_id";
        $this->db->query($query);
        $this->db->bind('administrator_id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
