<?php

class Group
{
    private $db;

    public function __construct()
    {
        $this->db = new MySQLHandler("groups");
    }

    public function getGroups()
    {
        return $this->db->get_all();
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
            "description" => $_POST["description"],
            "role" => $_POST["role"]
        );
        return $this->db->update($data, $id);
    }

    public function delete($id)
    {
        return $this->db->delete($id);
    }
}
