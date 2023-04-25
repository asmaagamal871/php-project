<?php
if (!defined('__ROOT__'))
    define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . "/models/DbHandler.php");
require_once(__ROOT__ . '/../config.php');

class MySQLHandler implements DbHandler
{
    private $_db_handler;
    private $_table;
    private $_primary_key;

    public function __construct($table, $primary_key = "id")
    {
        $this->_table = $table;
        $this->connect();
        $this->_primary_key = $primary_key;
    }
    public function connect()
    {
        try {
            $handler = mysqli_connect(__HOST__, __USER__, __PASS__, __DB__, __PORT__);
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
        if ($this->_db_handler) {
            mysqli_close($this->_db_handler);
        }
    }

    private function get_results($sql)
    {
        if (__Debug__Mode__ === 1) {
            echo "<h5>Sent Query: </h5>" . $sql . "<br/><br/>";
        }
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

    public function get_all()
    {
        $table = $this->_table;
        $sql = "SELECT * FROM `$table`";
        return $this->get_results($sql);
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
        if ($password != $user['password']) {
            // Invalid password
            return false;
        }

        // Login successful - set session variables and redirect to home page
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['group_id'] = $user['group_id'];
        return true;
    }
    

    public function search($column, $column_value)
    {
        $table = $this->_table;
        $sql = "select * from `$table` where `$column` like  '%" . $column_value . "%' ";
        return $this->get_results($sql);
    }

    public function save($new_values)
    {
        if (is_array($new_values)) {
            $table = $this->_table;
            $sql1 = "insert into `$table` (";
            $sql2 = " values (";
            foreach ($new_values as $key => $value) {
                $sql1 .= "`$key` ,";
                if (is_numeric($value)) {
                    $sql2 .= " $value ,";
                } else {
                    $sql2 .= " '" . $value . "' ,";
                }
            }
            $sql1 = $sql1 . ") ";
            $sql2 = $sql2 . ") ";
            $sql1 = str_replace(",)", ")", $sql1);
            $sql2 = str_replace(",)", ")", $sql2);
            $sql = $sql1 . $sql2;


            if (mysqli_query($this->_db_handler, $sql)) {
                $this->disconnect();
                return true;
            } else {
                $this->disconnect();
                return false;
            }
        }
    }

    public function update($edited_values, $id)
    {
        $table = $this->_table;
        $primary_key = $this->_primary_key;
        $sql = "update  `" . $table . "` set  ";
        foreach ($edited_values as $key => $value) {
            if ($key != $primary_key) {
                if (!is_numeric($value)) {
                    $sql .= " `$key` = '$value'  ,";
                } else {
                    $sql .= " `$key` = $value ,";
                }
            }
        }

        $sql .= "where `" . $primary_key . "` = $id";
        $sql = str_replace(",where", "where", $sql);

        if (mysqli_query($this->_db_handler, $sql)) {
            $this->disconnect();
            return true;
        } else {
            $this->disconnect();
            return false;
        }
    }
    public function delete($id)
    {
        $table = $this->_table;
        $primary_key = $this->_primary_key;
        $sql = "delete  from `" . $table . "` where `" . $primary_key . "` = $id";
        if (mysqli_query($this->_db_handler, $sql)) {
            $this->disconnect();
            return true;
        } else {
            $this->disconnect();
            return false;
        }
    }
    public function group_vs_user(){
        $count_users = "SELECT groups.name as group_name,COUNT(*) as user_count FROM users, groups where groups.id=users.group_id group by groups.name";
        $result = mysqli_query($this->_db_handler, $count_users);
        return $result;
    }
}
