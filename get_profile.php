<?php

session_start();

$id = $_GET['id'];

$mysqli = new mysqli('localhost', 'root2', 'root2', 'blog');

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
