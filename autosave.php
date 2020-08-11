<?php

include "config.php";

$postid = $_POST['postid'];
$title = $_POST['title'];
$content = $_POST['content'];

// Check entry
$stmt = $con->prepare("SELECT count(*) as cntpost FROM posts WHERE id=?");
$stmt->bind_param("i", $postid);
$stmt->execute();
$fetchdata = $stmt->get_result()->fetch_assoc();
$count = $fetchdata['cntpost'];

if ($count == 0) {

    $stmt = $con->prepare("INSERT INTO posts(title,content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();
    $postid = $stmt->insert_id;
} else {
    $stmt = $con->prepare("UPDATE posts SET title=?,content=? where id=?");
    $stmt->bind_param("ssi", $title, $content, $postid);
    $stmt->execute();
}

echo $postid;
