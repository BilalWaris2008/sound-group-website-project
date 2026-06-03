<?php

include("./includes/config.php");
include("./includes/header.php");

$artist = mysqli_real_escape_string(
    $connection,
    $_GET['artist']
);

$get_music = mysqli_query(
    $connection, "SELECT * FROM music WHERE artist = '$artist' ORDER BY id DESC"
);

$get_videos = mysqli_query(
    $connection, "SELECT * FROM videos WHERE artist = '$artist' ORDER BY id DESC"
);

?>

<link rel="stylesheet" href="./css/style.css">

<section class="py-5">

    <section class="container py-5">

        <section class="artists-title mb-5">

            <h2 class="text-white"><?php echo $artist; ?></h2>

        </section>

        <!-- Musics -->

        <h2 class="section-heading mb-3">Songs</h2>

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

        <!-- Videos -->

        <h2 class="section-heading mb-3 mt-4">Videos</h2>

        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

            <?php while ($video = mysqli_fetch_assoc($get_videos)) { ?>

                <section class="col">

                    <section class="music-card">

                        <section class="music-img">

                            <img src="./uploads/images/<?php echo $video['image']; ?>" class="img-fluid">

                             <section class="video-play-icon">
                                <a href="video-details.php?id=<?php echo $video['id']; ?>">
                                    <i class="bi bi-play-fill"></i>
                                </a>
                            </section>

                        </section>

                        <section class="music-content">

                            <h5><?php echo $video['title']; ?></h5>
                            <p><?php echo $video['artist']; ?></p>
                            <a href="video-details.php?id=<?php echo $video['id']; ?>" class="play-btn">Watch Now</a>

                        </section>

                    </section>

                </section>

            <?php } ?>

        </section>

    </section>

</section>

<?php include("./includes/footer.php"); ?>