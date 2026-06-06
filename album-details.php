<?php

include("./includes/config.php");
include("./includes/header.php");

if (
    !isset($_GET['album']) || empty($_GET['album'])
) {
    header("Location: index.php");
    exit();
}

$album = mysqli_real_escape_string(
    $connection,
    $_GET['album']
);

$get_music = mysqli_query(
    $connection,
    "SELECT * FROM music WHERE album = '$album' ORDER BY id DESC"
);

?>

<link rel="stylesheet" href="./css/style.css">

<section class="py-5">

    <section class="container py-3">

        <section class="text-center mb-5 artists-title">

            <h2 class="text-white"><?php echo $album; ?></h2>

        </section>

        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

            <?php while ($music = mysqli_fetch_assoc($get_music)) { ?>

                <section class="col">

                    <section class="music-card">

                        <section class="music-img">

                            <img src="./uploads/images/<?php echo $music['image']; ?>" class="img-fluid">

                        </section>

                        <section class="music-content">

                            <h5><?php echo $music['title']; ?></h5>
                            <p><?php echo $music['artist']; ?></p>
                            <a href="music-details.php?id=<?php echo $music['id']; ?>" class="play-btn">Play Now</a>

                        </section>

                    </section>

                </section>

            <?php } ?>

        </section>

    </section>

</section>

<?php include("./includes/footer.php"); ?>