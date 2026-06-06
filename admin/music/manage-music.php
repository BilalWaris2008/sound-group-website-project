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

$get_music = mysqli_query(
    $connection,
    "SELECT * FROM music ORDER BY id"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Music</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Link -->
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/manage.css">
</head>

<body>

    <section class="admin-wrapper">

        <?php include("../includes/sidebar.php"); ?>

        <section class="main-content">

            <section class="container-fluid py-4">

                <section class="page-header d-flex justify-content-between align-items-center mb-4">

                    <h1>Manage Music</h1>
                    <a href="add-music.php" class="btn add-music-btn">Add New Music</a>

                </section>

                <section class="table-responsive">

                    <table class="table align-middle text-center">

                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Artist</th>
                                <th>Album</th>
                                <th>Genre</th>
                                <th>Actions</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php while ($music = mysqli_fetch_assoc($get_music)) { ?>

                                <tr>

                                    <td><?php echo $music['id']; ?></td>
                                    <td>
                                        <img src="../../uploads/images/<?php echo $music['image']; ?>" class="music-thumb">
                                    </td>

                                    <td><?php echo $music['title']; ?></td>
                                    <td><?php echo $music['artist']; ?></td>
                                    <td><?php echo $music['album']; ?></td>
                                    <td><?php echo $music['genre']; ?></td>

                                    <td>
                                        <a href="edit-music.php?id=<?php echo $music['id']; ?>" class="btn btn-sm edit">Edit</a>
                                        <a href="delete-music.php?id=<?php echo $music['id']; ?>" class="btn btn-sm delete" onclick="return confirm('Are you sure you want to delete this music?')">Delete</a>
                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </section>

            </section>

        </section>

    </section>

</body>

</html>