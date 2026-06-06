<?php

include("./includes/config.php");
include("./includes/header.php");

$search = "";

if (isset($_GET['search']) && !empty(trim($_GET['search']))) {

    $search = mysqli_real_escape_string(
        $connection,
        trim($_GET['search'])
    );

    // Music Search

    $get_music = mysqli_query(
        $connection,
        "SELECT * FROM music
        WHERE title LIKE '%$search%'
        OR artist LIKE '%$search%'
        OR album LIKE '%$search%'
        OR genre LIKE '%$search%'
        OR language LIKE '%$search%'
        ORDER BY id DESC"
    );

    // Video Search

    $get_videos = mysqli_query(
        $connection,
        "SELECT * FROM videos
        WHERE title LIKE '%$search%'
        OR artist LIKE '%$search%'
        OR album LIKE '%$search%'
        OR genre LIKE '%$search%'
        OR language LIKE '%$search%'
        ORDER BY id DESC"
    );
}

?>

<link rel="stylesheet" href="./css/style.css">

<!-- MUSIC RESULTS -->

<section class="latest-music py-5">

    <section class="container">

        <section class="music-title">

            <h2>Search Results</h2>

            <p>
                Results for:
                "<?php echo htmlspecialchars($search); ?>"
            </p>

        </section>

        <!-- MUSIC -->

        <h3 class="text-white mb-4">Music Results</h3>

        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

            <?php

            if (
                isset($get_music) &&
                mysqli_num_rows($get_music) > 0
            ) {

                while ($music = mysqli_fetch_assoc($get_music)) {

            ?>

                    <section class="col">

                        <section class="music-card">

                            <section class="music-img">

                                <img src="./uploads/images/<?php echo $music['image']; ?>" alt="Music">
                                <span class="new-badge">MUSIC</span>

                            </section>

                            <section class="music-content">

                                <h5><?php echo $music['title']; ?></h5>
                                <p><?php echo $music['artist']; ?></p>
                                <a href="music-details.php?id=<?php echo $music['id']; ?>" class="play-btn">Play Now</a>

                            </section>

                        </section>

                    </section>

            <?php

                }
            } else {

                echo "
                <section class='col-12 text-center'>
                    <h5 class='text-secondary'>
                        No Music Found
                    </h5>
                </section>";
            }

            ?>

        </section>

        <!-- VIDEOS -->

        <h3 class="text-white mt-5 mb-4">Video Results</h3>

        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

            <?php

            if (
                isset($get_videos) &&
                mysqli_num_rows($get_videos) > 0
            ) {

                while ($video = mysqli_fetch_assoc($get_videos)) {

            ?>

                    <section class="col">

                        <section class="music-card">

                            <section class="music-img">

                                <img src="./uploads/images/<?php echo $video['image']; ?>" alt="Video">
                                <span class="new-badge">VIDEO</span>

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

            <?php

                }
            } else {

                echo "
                <section class='col-12 text-center'>
                    <h5 class='text-secondary'>
                        No Videos Found
                    </h5>
                </section>";
            }

            ?>

        </section>

    </section>

</section>

<?php include("./includes/footer.php"); ?>