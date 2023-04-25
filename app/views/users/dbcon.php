<?php

$con = mysqli_connect("127.0.0.1:3325", "root", "", "php-project");
if (!$con) {
    die('Connection Failed' . mysqli_connect_errno());
}
