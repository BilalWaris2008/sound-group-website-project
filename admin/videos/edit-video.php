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
    $connection,
    "SELECT * FROM videos WHERE id='$id'"
);

$video = mysqli_fetch_assoc($get_video);

$success = "";

if (isset($_POST['update'])) {

    $title = mysqli_real_escape_string($connection, trim($_POST['title']));
    $artist = mysqli_real_escape_string($connection, trim($_POST['artist']));
    $album = mysqli_real_escape_string($connection, trim($_POST['album']));
    $genre = mysqli_real_escape_string($connection, trim($_POST['genre']));
    $language = mysqli_real_escape_string($connection, trim($_POST['language']));
    $year = trim($_POST['year']);
    $description = mysqli_real_escape_string($connection, trim($_POST['description']));

    $image_name = $video['image'];
    $video_name = $video['video_file'];

    // 🖼️ IMAGE UPDATE
    if (!empty($_FILES['image']['name'])) {

        $oldImage = "../../uploads/images/" . $video['image'];

        if (!empty($video['image']) && file_exists($oldImage) && is_file($oldImage)) {
            unlink($oldImage);
        }

        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file(
            $image_tmp,
            "../../uploads/images/" . $image_name
        );
    }

    // 🎬 VIDEO FILE UPDATE
    if (!empty($_FILES['video_file']['name'])) {

        $oldVideo = "../../uploads/videos/" . $video['video_file'];

        if (!empty($video['video_file']) && file_exists($oldVideo) && is_file($oldVideo)) {
            unlink($oldVideo);
        }

        $video_name = $_FILES['video_file']['name'];
        $video_tmp = $_FILES['video_file']['tmp_name'];

        move_uploaded_file(
            $video_tmp,
            "../../uploads/videos/" . $video_name
        );
    }

    mysqli_query(
        $connection,
        "UPDATE videos SET
        title='$title',
        artist='$artist',
        album='$album',
        genre='$genre',
        language='$language',
        year='$year',
        image='$image_name',
        video_file='$video_name',
        description='$description'
        WHERE id='$id'"
    );

    $success = "Video Updated Successfully!";

    $get_video = mysqli_query(
        $connection,
        "SELECT * FROM videos WHERE id='$id'"
    );
    $video = mysqli_fetch_assoc($get_video);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Video</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Links -->
    <link rel="stylesheet" href="../css/edit.css">
</head>

<body>

    <section class="container py-5">
        <section class="row justify-content-center">
            <section class="col-lg-8">

                <section class="edit-card">

                    <h2 class="edit-title">Edit Video</h2>

                    <?php if ($success) { ?>
                        <section class="alert alert-success">
                            <?php echo $success; ?>
                        </section>
                    <?php } ?>

                    <form method="POST" enctype="multipart/form-data">

                        <section class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $video['title']; ?>">
                        </section>

                        <section class="mb-3">
                            <label class="form-label">Artist</label>
                            <input type="text" name="artist" class="form-control" value="<?php echo $video['artist']; ?>">
                        </section>

                        <section class="mb-3">
                            <label class="form-label">Album</label>
                            <input type="text" name="album" class="form-control" value="<?php echo $video['album']; ?>">
                        </section>

                        <section class="mb-3">
                            <label class="form-label">Genre</label>
                            <input type="text" name="genre" class="form-control" value="<?php echo $video['genre']; ?>">
                        </section>

                        <section class="mb-3">
                            <label class="form-label">Language</label>
                            <input type="text" name="language" class="form-control" value="<?php echo $video['language']; ?>">
                        </section>

                        <section class="mb-3">
                            <label class="form-label">Year</label>
                            <input type="number" name="year" class="form-control" value="<?php echo $video['year']; ?>">
                        </section>

                        <section class="mb-3">
                            <label class="form-label">Current Image</label><br>
                            <img src="../../uploads/images/<?php echo $video['image']; ?>" class="current-image">
                        </section>

                        <section class="mb-3">
                            <label class="form-label">Change Image</label>
                            <input type="file" name="image" class="form-control">
                        </section>

                        <section class="mb-3">
                            <label class="form-label">Current Video File</label><br>
                            <video width="200" controls>
                                <source src="../../uploads/videos/<?php echo $video['video_file']; ?>">
                            </video>
                        </section>

                        <section class="mb-3">
                            <label class="form-label">Change Video</label>
                            <input type="file" name="video_file" class="form-control">
                        </section>

                        <section class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="5" class="form-control"><?php echo $video['description']; ?></textarea>
                        </section>

                        <button type="submit" name="update" class="btn-update">Update Video</button>
                        <a href="manage-videos.php" class="btn-back">Back</a>

                    </form>

                </section>

            </section>

        </section>

    </section>

</body>

</html>