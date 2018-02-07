<?php

session_start();

$text = $_GET['text'];
$pid = $_GET['pid'];
$aid = $_GET['aid'];

if(strlen($text) == 0){
  echo json_encode(["success" => false, "message" => "text empty"]);
  exit();
}

$mysqli = new mysqli('localhost', 'root2', 'root2', 'blog');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$text = $mysqli->escape_string($text);

if ($result = $mysqli->query("INSERT INTO comments (pid, text, aid) VALUES ('$pid', '$text', '$aid')")) {
  $ID = $mysqli->insert_id;

  $result = $mysqli->query("SELECT * from accounts where ID = $aid");
  $data = $result->fetch_assoc();

  echo json_encode(["success" => true, "id" => $ID, "username" => $data['username'], "aid" => $aid]);
} else {
  echo json_encode(["success" => false]);
}



 ?>
