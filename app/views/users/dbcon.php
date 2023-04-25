<?php

$con = mysqli_connect(__HOST__, __USER__, __PASS__, __DB__);
if (!$con) {
    die('Connection Failed' . mysqli_connect_errno());
}