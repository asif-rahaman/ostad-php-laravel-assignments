<?php
session_start();
$first_name = $_SESSION ['first_name'];

echo $first_name;