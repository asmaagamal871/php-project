<?php

class MySQLHandler implements DbHandler
{
    private $_db_handler;
    private $_table;

    public function __construct($table)
    {
        $this->_table = $table;
        $this->connect();
    }
    public function connect()
    {
        try {
            $handler = mysqli_connect(__HOST__, __USER__, __PASS__, __DB__);
            if ($handler) {
                $this->_db_handler = $handler;
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e);
        }
    }
    public function disconnect()
    {
        if ($this->_db_handler)
            mysqli_close($this->_db_handler);
    }

    private function get_results($sql)
    {
        if (__Debug__Mode__ === 1)
            echo "<h5>Sent Query: </h5>" . $sql . "<br/><br/>";
        $_handler_results = mysqli_query($this->_db_handler, $sql);
        $_arr_results = array();

        if ($_handler_results) {
            while ($row = mysqli_fetch_array($_handler_results, MYSQLI_ASSOC)) {
                $_arr_results[] = array_change_key_case($row);
            }

            return $_arr_results;
        } else {
            return false;
        }
    }

    public function get_all_records_paginated($fields = array(), $start = 0)
    {
        $table = $this->_table;
        if (empty($fields)) {
            $sql = "SELECT * FROM `$table`";
        } else {
            $sql = "select ";
            foreach ($fields as $f) {
                $sql .= " `$f`, ";
            }
            $sql .= "from `$table` ";
            $sql = str_replace(", from", "from", $sql);
        }
        $sql .= "limit $start," . __RECORDS_PER_PAGE__;
        return $this->get_results($sql);
    }

    public function get_record_by_id($id, $primary_key = "id")
    {
        $table = $this->_table;
        $sql = "SELECT * FROM `$table` where `$primary_key`= $id";
        return $this->get_results($sql);
    }
    public function save_or_update($fields, $record)
    {
        $sql = "INSERT INTO " . $this->_table . " VALUES (";
        foreach ($record as $value) {
            $sql .= "?,";
        }
    }

    public function authenticate($email, $password)
    {
        // Connect to the database
        $conn = $this->connect();

        // Retrieve the user record from the database based on the email entered by the user
        $email = mysqli_real_escape_string($this->_db_handler, $email); // Escape special characters in email to prevent SQL injection
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($this->_db_handler, $sql);

        if (!$result || mysqli_num_rows($result) == 0) {
            // User not found in the database
            return false;
        }

        // Get the user record from the query result
        $user = mysqli_fetch_assoc($result);

        // Verify that the password entered by the user matches the hashed password stored in the database
        // if (!password_verify($password, $user['password'])) {
            if($password!= $user['password']){
            // Invalid password
            return false;
        }

        // Login successful - set session variables and redirect to home page
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['group_id'] = $user['group_id'];
        return true;
    }
}
