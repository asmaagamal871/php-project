<?php

class Article
{
    private $db;

    public function __construct()
    {
        $this->db = new MySQLHandler("articles");
    }

    public function getArticles()
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

    public function getUserArticles($id)
    {
        return $this->db->get_record_by_id($id, 'user_id');
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
