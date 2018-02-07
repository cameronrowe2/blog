<?php

session_start();

$id = $_GET['id'];

$mysqli = new mysqli('localhost', 'root2', 'root2', 'blog');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($result = $mysqli->query("SELECT posts.ID, posts.text, posts.title, posts.image, posts.aid, accounts.username, accounts.image AS profile_image FROM posts, accounts WHERE posts.aid = accounts.ID AND posts.ID = '$id'")) {
  $data = $result->fetch_assoc();

  echo json_encode(["success" => true, "post" => $data]);
} else {
  echo json_encode(["success" => false]);
}



 ?>
