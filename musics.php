<?php

include("./includes/config.php");
include("./includes/header.php");

$get_videos = mysqli_query(
    $connection, "SELECT * FROM videos ORDER BY id DESC"
);

?>

<link rel="stylesheet" href="./css/style.css">

<section class="latest-music">

    <section class="container">

        <section class="music-title">

            <h2>Music</h2>
            <p>Discover songs and trending music</p>

        </section>

        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

            <?php

            $get_music = mysqli_query(
                $connection,
                "SELECT * FROM music ORDER BY id DESC LIMIT 5"
            );
            while ($music = mysqli_fetch_assoc($get_music)) {
            ?>

                <section class="col">

                    <section class="music-card">

                        <section class="music-img">

                            <img src="./uploads/images/<?php echo $music['image']; ?>" alt="Music">
                            <span class="new-badge">NEW</span>

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