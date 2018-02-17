<?php

session_start();

require 'config.php';

$id = $_GET['id'];

$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($result = $mysqli->query("SELECT comments.ID, comments.text, comments.pid, comments.aid, accounts.username FROM comments, accounts WHERE comments.pid = $id AND accounts.ID = comments.aid")) {
  $data = [];

  while($row = $result->fetch_assoc()){
    $data[] = $row;
  }

  echo json_encode(["success" => true, "comments" => $data]);
} else {
  echo json_encode(["success" => false]);
}



 ?>
