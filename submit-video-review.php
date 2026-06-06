<?php

include("./includes/config.php");
session_start();

$user_id = $_SESSION['user_id'];
$video_id = $_POST['video_id'];
$rating = $_POST['rating'];
$review = $_POST['review'];

$sql = "INSERT INTO reviews (user_id, video_id, rating, review)
        VALUES ('$user_id', '$video_id', '$rating', '$review')
        ON DUPLICATE KEY UPDATE
        rating = VALUES(rating),
        review = VALUES(review)";

mysqli_query($connection, $sql);

header("Location: video-details.php?id=$video_id");
exit();
