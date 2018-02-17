<?php

session_start();

require 'config.php';

$id = $_GET['id'];
$image = $_GET['image'];

$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$id = $mysqli->escape_string($id);
$image = $mysqli->escape_string($image);

if ($result = $mysqli->query("UPDATE accounts SET image='$image' WHERE ID = $id")) {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false, "error" => $mysqli->error]);
}



 ?>
