<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "user_db";

$con = mysqli_connect($host, $user, $password, $dbname);

$id = 0;
$update = false;
$title = '';
$content = '';

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $result = $con->query("DELETE FROM posts WHERE id=$id") or die($mysqli->error());
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $con->query("SELECT * FROM posts WHERE id=$id") or die($mysqli->error());
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $title = $row['title'];
        $content = $row['content'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $mysqli->query("UPDATE posts SET title='$title' , content='$content' WHERE id=$id") or die($mysqli->error);
}
