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
}
