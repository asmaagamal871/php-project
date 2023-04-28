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
        try {
            $this->db->save($_POST);
            return true;
        } catch(Exception $e) {
            return false;
        }
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
        );

        try {
            $this->db->update($data, $id);
            return true;
        } catch(Exception $e) {
            return false;
        }
    }

    public function restore($id)
    {
        return $this->db->restore($id);
    }

    public function delete($id)
    {
        return $this->db->delete($id);
    }
}
