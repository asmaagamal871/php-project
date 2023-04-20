<?php

$con = mysqli_connect("localhost", "root", "", "php_project");
if (!$con) {
    die('Connection Failed' . mysqli_connect_errno());
}
