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
$errors = [];
$success = "";

if (isset($_POST['submit'])) {

    // Get Form Data

    $title = trim($_POST['title']);
    $artist = trim($_POST['artist']);
    $album = trim($_POST['album']);
    $genre = trim($_POST['genre']);
    $language = trim($_POST['language']);
    $year = trim($_POST['year']);
    $description = trim($_POST['description']);

    // Image Data

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Image Extension

    $image_extension = strtolower(
        pathinfo(
            $image_name,
            PATHINFO_EXTENSION
        )
    );

    // Allowed Images

    $allowed_images = ['jpg', 'jpeg', 'png', 'webp'];

    // Check Image Extension

    if (!in_array($image_extension, $allowed_images)) {
        $errors['image'] = "Only JPG, PNG & WEBP allowed.";
    }

    // Music Data

    $music_name = $_FILES['music_file']['name'];
    $music_tmp = $_FILES['music_file']['tmp_name'];

    // Music Extension

    $music_extension = strtolower(
        pathinfo(
            $music_name,
            PATHINFO_EXTENSION
        )
    );

    // Allowed Extensions

    $allowed_music = ['mp3'];

    // Check Extension

    if (!in_array($music_extension, $allowed_music)) {
        $errors['music_file'] = "Only MP3 files are allowed.";
    }

    // Empty Fields Validations

    if (empty($title)) {
        $errors['title'] = "Music title is required.";
    }

    if (empty($artist)) {
        $errors['artist'] = "Artist name is required.";
    }

    if (empty($album)) {
        $errors['album'] = "Album name is required.";
    }

    if (empty($genre)) {
        $errors['genre'] = "Genre is required.";
    }

    if (empty($language)) {
        $errors['language'] = "Language is required.";
    }

    if (empty($year)) {
        $errors['year'] = "Year is required.";
    }

    if (empty($description)) {
        $errors['description'] = "Description is required.";
    }

    if (empty($image_name)) {
        $errors['image'] = "Music image is required.";
    }

    if (empty($music_name)) {
        $errors['music_file'] = "Music file is required.";
    }

    if (empty($errors)) {

        // Upload Image

        move_uploaded_file(
            $image_tmp,
            "../../uploads/images/" . $image_name
        );

        // Upload Music

        move_uploaded_file(
            $music_tmp,
            "../../uploads/music/" . $music_name
        );

        // Insert Query

        $insert = mysqli_query(
            $connection,
            "INSERT INTO music(
                title,
                artist,
                album,
                genre,
                language,
                year,
                image,
                music_file,
                description
            )

            VALUES(
                '$title',
                '$artist',
                '$album',
                '$genre',
                '$language',
                '$year',
                '$image_name',
                '$music_name',
                '$description'
            )"
        );

        // Success

        if ($insert) {
            $success = "Music Added Successfully!";
        } else {
            $errors['database'] = "Something went wrong.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Music</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Links -->
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/add-music.css">
</head>

<body>

    <section class="admin-wrapper">

        <?php include("../includes/sidebar.php"); ?>

        <section class="main-content">

            <section class="container-fluid py-4">

                <section class="row justify-content-center">

                    <section class="col-lg-8">

                        <section class="add-music-card">

                            <h2>Add Music</h2>

                            <?php if ($success) { ?>
                                <section class="success-msg"><?php echo $success; ?></section>
                            <?php } ?>

                            <form action="" method="POST" enctype="multipart/form-data">

                                <!-- Title -->

                                <section class="mb-3">

                                    <label class="form-label">Music Title</label>
                                    <input type="text" name="title" class="form-control" value="<?php echo isset($title) ? htmlspecialchars($title) : ''; ?>">

                                    <?php if (isset($errors['title'])) { ?>
                                        <section class="error-text"><?php echo $errors['title']; ?></section>
                                    <?php } ?>

                                </section>

                                <!-- Artist -->

                                <section class="mb-3">

                                    <label class="form-label">Artist</label>
                                    <input type="text" name="artist" class="form-control" value="<?php echo isset($artist) ? htmlspecialchars($artist) : ''; ?>">

                                    <?php if (isset($errors['artist'])) { ?>
                                        <section class="error-text"><?php echo $errors['artist']; ?></section>
                                    <?php } ?>

                                </section>

                                <!-- Album -->

                                <section class="mb-3">

                                    <label class="form-label">Album</label>
                                    <input type="text" name="album" class="form-control" value="<?php echo isset($album) ? htmlspecialchars($album) : ''; ?>">

                                    <?php if (isset($errors['album'])) { ?>
                                        <section class="error-text"><?php echo $errors['album']; ?></section>
                                    <?php } ?>

                                </section>

                                <!-- Genre -->

                                <section class="mb-3">

                                    <label class="form-label">Genre</label>
                                    <input type="text" name="genre" class="form-control" value="<?php echo isset($genre) ? htmlspecialchars($genre) : ''; ?>">

                                    <?php if (isset($errors['genre'])) { ?>
                                        <section class="error-text"><?php echo $errors['genre']; ?></section>
                                    <?php } ?>

                                </section>

                                <!-- Language -->

                                <section class="mb-3">

                                    <label class="form-label">Language</label>
                                    <input type="text" name="language" class="form-control" value="<?php echo isset($language) ? htmlspecialchars($language) : ''; ?>">

                                    <?php if (isset($errors['language'])) { ?>
                                        <section class="error-text"><?php echo $errors['language']; ?></section>
                                    <?php } ?>

                                </section>

                                <!-- Year -->

                                <section class="mb-3">

                                    <label class="form-label">Year</label>
                                    <input type="number" name="year" class="form-control" value="<?php echo isset($year) ? htmlspecialchars($year) : ''; ?>">

                                    <?php if (isset($errors['year'])) { ?>
                                        <section class="error-text"><?php echo $errors['year']; ?></section>
                                    <?php } ?>

                                </section>

                                <!-- Image -->

                                <section class="mb-3">

                                    <label class="form-label">Music Image</label>
                                    <input type="file" name="image" class="form-control">

                                    <?php if (isset($errors['image'])) { ?>
                                        <section class="error-text"><?php echo $errors['image']; ?></section>
                                    <?php } ?>

                                </section>

                                <!-- Music File -->

                                <section class="mb-3">

                                    <label class="form-label">Music File</label>
                                    <input type="file" name="music_file" class="form-control">

                                    <?php if (isset($errors['music_file'])) { ?>
                                        <section class="error-text"><?php echo $errors['music_file']; ?></section>
                                    <?php } ?>

                                </section>

                                <!-- Description -->

                                <section class="mb-3">

                                    <label class="form-label">Description</label>
                                    <textarea name="description" rows="4" class="form-control">
                                        <?php echo isset($description) ? htmlspecialchars($description) : ''; ?>
                                    </textarea>

                                    <?php if (isset($errors['description'])) { ?>
                                        <section class="error-text"><?php echo $errors['description']; ?></section>
                                    <?php } ?>

                                </section>

                                <button type="submit" name="submit" class="btn-add-music">Add Music</button>

                            </form>

                        </section>

                    </section>

                </section>

            </section>

        </section>

    </section>

</body>

</html>