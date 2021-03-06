<?php

session_start();

require 'config.php';

$text = $_GET['text'];
$pid = $_GET['pid'];
$aid = $_GET['aid'];

if(strlen($text) == 0){
  echo json_encode(["success" => false, "message" => "text empty"]);
  exit();
}

$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$text = $mysqli->escape_string($text);
$pid = $mysqli->escape_string($pid);
$aid = $mysqli->escape_string($aid);

if ($result = $mysqli->query("INSERT INTO comments (pid, text, aid) VALUES ('$pid', '$text', '$aid')")) {
  $ID = $mysqli->insert_id;

  // get account id
  $result = $mysqli->query("SELECT * from posts where ID = $pid");
  $data = $result->fetch_assoc();
  $post_aid = $data['aid'];

  // add notification
  $result = $mysqli->query("INSERT INTO notifications (pid, aid, commenter) VALUES ('$pid', '$post_aid', '$aid')");

  $result = $mysqli->query("SELECT * from accounts where ID = $aid");
  $data = $result->fetch_assoc();

  echo json_encode(["success" => true, "id" => $ID, "username" => $data['username'], "aid" => $aid]);
} else {
  echo json_encode(["success" => false]);
}



 ?>
