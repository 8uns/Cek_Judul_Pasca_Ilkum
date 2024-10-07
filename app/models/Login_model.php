<?php

class Login_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function loginAdmin($data)
    {
        $true = false;
        $data['password'] = md5($data['password']);
        $query = "SELECT * FROM administrators";
        $this->db->query($query);
        $this->db->execute();
        $dataMember = $this->db->resultSet();
        $this->db->close();


        foreach ($dataMember as $user) {
            if ($user['username'] == $data['username'] && $user['password'] == $data['password']) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['user_id'] = $user['administrator_id'];
                $_SESSION['image'] = '';
                $_SESSION['level'] = $user['levels'];
                $true = true;
            }
        }
        return $true;
    }

    public function login($user, $data)
    {
        return $this->loginAdmin($data);
    }
}
