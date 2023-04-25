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
        return $this->db->get_all_records_paginated();
    }
}
