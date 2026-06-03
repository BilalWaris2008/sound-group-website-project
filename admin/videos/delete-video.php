<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SESSION['user_role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

include("../../includes/config.php");

$id = $_GET['id'];

$get_video = mysqli_query(
    $connection, "SELECT * FROM videos WHERE id='$id'"
);

$video = mysqli_fetch_assoc($get_video);

// 🖼️ delete image
if (!empty($video['image']) &&
    file_exists("../../uploads/images/" . $video['image'])) {
    unlink("../../uploads/images/" . $video['image']);
}

// 🎬 delete video file
if (!empty($video['video_file']) &&
    file_exists("../../uploads/videos/" . $video['video_file'])) {
    unlink("../../uploads/videos/" . $video['video_file']);
}

// 🗑️ delete record
mysqli_query(
    $connection, "DELETE FROM videos WHERE id='$id'"
);

header("Location: manage-videos.php");
exit();