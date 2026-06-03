<?php

session_start();
include("./includes/config.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$music_id = $_POST['music_id'];
$rating = $_POST['rating'];
$review = mysqli_real_escape_string($connection, $_POST['review']);

$sql = "INSERT INTO reviews (music_id, user_id, rating, review)
        VALUES ('$music_id', '$user_id', '$rating', '$review')
        ON DUPLICATE KEY UPDATE
        rating = VALUES(rating),
        review = VALUES(review)";

mysqli_query($connection, $sql);

header("Location: music-details.php?id=" . $music_id);
exit();

?>