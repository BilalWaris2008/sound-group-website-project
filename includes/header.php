<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("./includes/config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sound Group</title>

    <!-- Bootstrap 5 CSS CDN  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icon CDN  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS Link -->
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>


    <!-- Navbar Start -->

    <nav class="navbar navbar-expand-xl navbar-dark py-3 custom-navbar">
        <section class="container">

            <a class="navbar-brand" href="/soundgroup">SOUND GROUP</a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <section class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a href="/soundgroup" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="/soundgroup/musics.php" class="nav-link">Music</a>
                    </li>

                    <li class="nav-item">
                        <a href="/soundgroup/videos.php" class="nav-link">Videos</a>
                    </li>

                    <li class="nav-item">
                        <a href="/soundgroup/artist.php" class="nav-link">Artist</a>
                    </li>

                    <li class="nav-item">
                        <a href="/soundgroup/albums.php" class="nav-link">Albums</a>
                    </li>

                    <li class="nav-item">
                        <a href="/soundgroup/contact.php" class="nav-link">Contact</a>
                    </li>

                </ul>

                <!-- Search Form -->
                <form action="search.php" method="GET" class="d-flex me-4">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search">
                    <button type="submit" class="btn btn-success">Search</button>
                </form>

                <!-- User Actions -->
                <section class="d-flex align-items-center gap-2 user-actions">

                    <?php if (isset($_SESSION['user_id'])) { ?>

                        <span class="text-white">Welcome, <?php echo $_SESSION['user_name']; ?></span>
                        <a href="auth/logout.php" class="btn btn-success">Logout</a>

                    <?php } else { ?>

                        <a href="./auth/login.php" class="btn btn-outline-light">Login</a>
                        <a href="./auth/register.php" class="btn btn-success">Register</a>

                    <?php } ?>

                </section>

            </section>

        </section>
    </nav>