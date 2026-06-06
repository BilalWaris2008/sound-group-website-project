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

$get_videos = mysqli_query(
    $connection,
    "SELECT * FROM videos ORDER BY id"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Videos</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Links -->
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/manage.css">
</head>

<body>

    <section class="admin-wrapper">

        <?php include("../includes/sidebar.php"); ?>

        <section class="main-content">

            <section class="container-fluid py-4">

                <section class="page-header d-flex justify-content-between align-items-center mb-4">

                    <h1>Manage Videos</h1>
                    <a href="add-video.php" class="btn add-music-btn">Add New Video</a>

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

                            <?php while ($video = mysqli_fetch_assoc($get_videos)) { ?>

                                <tr>

                                    <td><?php echo $video['id']; ?></td>
                                    <td>
                                        <img src="../../uploads/images/<?php echo $video['image']; ?>" class="music-thumb">
                                    </td>

                                    <td><?php echo $video['title']; ?></td>
                                    <td><?php echo $video['artist']; ?></td>
                                    <td><?php echo $video['album']; ?></td>
                                    <td><?php echo $video['genre']; ?></td>
                                    <td>
                                        <a href="edit-video.php?id=<?php echo $video['id']; ?>" class="btn btn-sm edit">Edit</a>
                                        <a href="delete-video.php?id=<?php echo $video['id']; ?>" class="btn btn-sm delete" onclick="return confirm('Are you sure?')">Delete</a>
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