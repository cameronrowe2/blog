<?php

session_start();

$id = $_GET['id'];

$mysqli = new mysqli('localhost', 'root2', 'root2', 'blog');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($result = $mysqli->query("SELECT posts.ID, posts.text, posts.title, posts.image, posts.aid, accounts.username, accounts.image AS profile_image FROM posts, accounts WHERE posts.aid = accounts.ID && posts.aid = '$id' ORDER BY posts.ID DESC")) {
  $data = $result->num_rows / 10;

  echo json_encode(["success" => true, "pages" => $data]);
} else {
  echo json_encode(["success" => false]);
}



 ?>
