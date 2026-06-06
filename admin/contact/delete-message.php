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

mysqli_query(
    $connection,
    "DELETE FROM contact_messages WHERE id='$id'"
);

header("Location: manage-messages.php");
exit();
