<?php

session_start();

require 'config.php';

$id = mysqli_real_escape_string($_GET['id']);

$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

// save fp hash to database
if($result = $mysqli->query("UPDATE notifications SET seen=1 WHERE aid = '$id'")) {

  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false, "message" => "hash not saved correctly"]);
}

 ?>
