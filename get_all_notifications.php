<?php

session_start();

require 'config.php';

$id = $_GET['id'];

$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($result = $mysqli->query("SELECT notifications.*, accounts.username FROM notifications, accounts WHERE aid = '$id' && accounts.ID = notifications.commenter")) {
  $data = [];

  while($row = $result->fetch_assoc()){
    $data[] = $row;
  }

  echo json_encode(["success" => true, "notifications" => $data]);
} else {
  echo json_encode(["success" => false]);
}



 ?>
