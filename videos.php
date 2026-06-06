<?php

include("./includes/config.php");
include("./includes/header.php");

$get_videos = mysqli_query(
    $connection,
    "SELECT * FROM videos ORDER BY id DESC"
);

?>

<link rel="stylesheet" href="./css/style.css">

<section class="latest-videos mt-5">

    <section class="container">

        <section class="videos-title">

            <h2>Videos</h2>
            <p>Watch trending videos and latest releases</p>

        </section>

        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 justify-content-center g-4">

            <?php

            $get_videos = mysqli_query(
                $connection,
                "SELECT * FROM videos ORDER BY id DESC"
            );
            while ($video = mysqli_fetch_assoc($get_videos)) {

            ?>

                <section class="col">

                    <section class="video-card">

                        <section class="video-image">

                            <img src="./uploads/images/<?php echo $video['image']; ?>" alt="Video">

                            <section class="video-play-icon">
                                <a href="video-details.php?id=<?php echo $video['id']; ?>">
                                    <i class="bi bi-play-fill"></i>
                                </a>
                            </section>

                        </section>

                        <section class="video-content">

                            <h5><?php echo $video['title']; ?></h5>
                            <p><?php echo $video['artist']; ?></p>
                            <a href="video-details.php?id=<?php echo $video['id']; ?>" class="watch-btn">Watch Now</a>

                        </section>

                    </section>

                </section>

            <?php } ?>

        </section>

    </section>

</section>

<?php include("./includes/footer.php"); ?>