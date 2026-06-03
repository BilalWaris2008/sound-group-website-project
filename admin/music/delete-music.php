<?php

session_start();

// Login Check

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Admin Check

if ($_SESSION['user_role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

include("../../includes/config.php");

$id = $_GET['id'];

// Get Music Record

$get_music = mysqli_query(
    $connection, "SELECT * FROM music WHERE id='$id'"
);

$music = mysqli_fetch_assoc($get_music);

// Delete Image

if (
    !empty($music['image']) &&
    file_exists("../uploads/images/" . $music['image'])
) {
    unlink("../uploads/images/" . $music['image']);
}

// Delete Music File

if (
    !empty($music['music_file']) &&
    file_exists("../uploads/music/" . $music['music_file'])
) {
    unlink("../uploads/music/" . $music['music_file']);
}

// Delete Database Record

mysqli_query(
    $connection, "DELETE FROM music WHERE id='$id'"
);

// Redirect

header("Location: manage-music.php");
exit();
