<?php

session_start();

$id = $_GET['id'];
$image = $_GET['image'];

$mysqli = new mysqli('localhost', 'root2', 'root2', 'blog');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($result = $mysqli->query("UPDATE accounts SET image='$image' WHERE ID = $id")) {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false, "error" => $mysqli->error]);
}



 ?>
