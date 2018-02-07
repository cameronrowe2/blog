<?php

session_start();

$mysqli = new mysqli('localhost', 'root2', 'root2', 'blog');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$id = $_SESSION['ID'];

if ($result = $mysqli->query("SELECT * FROM accounts WHERE ID = $id")) {
  $row = $result->fetch_assoc();

  echo json_encode(["success" => true, "email" => $row['email']]);
} else {
  echo json_encode(["success" => false]);
}



 ?>
