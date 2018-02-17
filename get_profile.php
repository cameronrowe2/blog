<?php

session_start();

require 'config.php';

$id = $_GET['id'];

$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($result = $mysqli->query("SELECT * FROM accounts WHERE ID = '$id'")) {
  $data = $result->fetch_assoc();

  echo json_encode(["success" => true, "profile" => $data]);
} else {
  echo json_encode(["success" => false]);
}



 ?>
