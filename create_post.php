<?php

session_start();

$text = $_POST['text'];
$title = $_POST['title'];
$image_url = $_POST['image_url'];
$aid = $_POST['aid'];

if($text == "") {
  echo json_encode(["success" => false, "message" => "text empty"]);
  exit();
}

if($title == "") {
  echo json_encode(["success" => false, "message" => "title empty"]);
  exit();
}

if($image_url == "") {
  echo json_encode(["success" => false, "message" => "image empty"]);
  exit();
}

if($aid == "") {
  echo json_encode(["success" => false, "message" => "account id empty"]);
  exit();
}

$mysqli = new mysqli('localhost', 'root2', 'root2', 'blog');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$text = $mysqli->escape_string($text);

if ($result = $mysqli->query("INSERT INTO posts (title, text, image, aid) VALUES ('$title', '$text', '$image_url', '$aid')")) {
  $ID = $mysqli->insert_id;

  if($result = $mysqli->query("SELECT posts.*, accounts.ID as aid, accounts.username, accounts.image as profile_image from posts, accounts where posts.aid = accounts.ID and posts.ID = $ID")){
    $data = $result->fetch_assoc();

    echo json_encode(["success" => true, "id" => $ID, "data" => $data]);
  } else {
    echo json_encode(["success" => false, "error" => $mysqli->error]);
  }
} else {
  echo json_encode(["success" => false, "error" => $mysqli->error]);
}



 ?>
