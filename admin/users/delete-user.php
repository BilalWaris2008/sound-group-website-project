<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../auth/login.php");
    exit();
}

if ($_SESSION['user_role'] != 'admin') {
    header("Location: ../../index.php");
    exit();
}

include("../../includes/config.php");

$id = $_GET['id'];

$get_user = mysqli_query(
    $connection,
    "SELECT * FROM users WHERE id = '$id'"
);

$user = mysqli_fetch_assoc($get_user);

if ($user['role'] != 'admin') {

    mysqli_query(
        $connection,
        "DELETE FROM users WHERE id = '$id'"
    );
}

header("Location: manage-users.php");
exit();
