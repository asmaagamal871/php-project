<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new MySQLHandler("users");
    }

    public function getUsers()
    {
        return $this->db->get_all_records_paginated();
    }

    public function create()
    {
        return $this->db->save($_POST);
    }

    public function getByID($id)
    {
        return $this->db->get_record_by_id($id);
    }

    public function update($id)
    {
        $data = array(
            "name" => $_POST["name"],
            "email" => $_POST["email"],
            "phone" => $_POST["phone"],
            "username" => $_POST["username"],
            "password" => $_POST["password"],
            "group_id" => $_POST["group_id"],
        );
        return $this->db->update($data, $id);
    }

    public function delete($id)
    {
        return $this->db->delete($id);
    }
}
