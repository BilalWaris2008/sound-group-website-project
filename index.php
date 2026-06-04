<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

include("./includes/config.php");
include("./includes/header.php");

?>

<!-- Banner -->

<section class="home-banner">

    <section>
        <h1>Unlimited Music & Videos</h1>
    </section>
    <p>Latest Songs & Entertainment Anytime</p>
    <a href="/soundgroup/musics.php"><button class="btn btn-success btn-lg mt-3 px-5 explore-btn">Explore Now</button></a>

</section>


<!-- Latest Music -->

<section class="latest-music">

    <section class="container">

        <section class="music-title">

            <h2>Latest Music</h2>
            <p>Discover newly added songs and trending music</p>

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


<!-- Artists Section -->

<section class="artists-section">

    <section class="container">

        <section class="artists-title">

            <h2>Popular Artists</h2>
            <p>Listen to songs from your favorite artists</p>

        </section>

        <section class="row g-4 justify-content-center">

            <section class="col-lg-3 col-md-6 col-sm-6">

                <a href="artist-details.php?artist=Kaifi%20Khalil" class="artist-link">

                    <section class="artist-card">

                        <img src="./assets/music/musicimg1.png" alt="Artist">
                        <h5>Kaifi Khalil</h5>
                        <span>Artist</span>

                    </section>

                </a>

            </section>

            <section class="col-lg-3 col-md-6 col-sm-6">


                <a href="artist-details.php?artist=One%20Direction" class="artist-link">

                    <section class="artist-card">

                        <img src="./assets/artists/onedirection.png" alt="Artist">
                        <h5>One Direction</h5>
                        <span>Pop Artist</span>

                    </section>

                </a>

            </section>

            <section class="col-lg-3 col-md-6 col-sm-6">

                <a href="artist-details.php?artist=AUR" class="artist-link">

                    <section class="artist-card">

                        <img src="./assets/artists/aur.png" alt="Artist">
                        <h5>AUR</h5>
                        <span>Singer</span>

                    </section>

                </a>

            </section>

            <section class="col-lg-3 col-md-6 col-sm-6">


                <a href="artist-details.php?artist=Ed%20Sheeran" class="artist-link">

                    <section class="artist-card">

                        <img src="./assets/artists/edsheeran.jpeg" alt="Artist">
                        <h5>Ed Sheeran</h5>
                        <span>Singer</span>

                    </section>

                </a>

            </section>

        </section>

    </section>

</section>



<!-- Videos Section  -->

<section class="latest-videos">

    <section class="container">

        <section class="videos-title">

            <h2>Latest Videos</h2>
            <p>Watch trending music videos and latest releases</p>

        </section>

        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

            <?php

            $get_videos = mysqli_query(
                $connection,
                "SELECT * FROM videos ORDER BY id DESC LIMIT 5"
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

                            <span class="new-badge">NEW</span>

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


<!-- Genres Section -->

<section class="genres-section">

    <section class="container">

        <section class="genres-title">

            <h2>Browse Genres</h2>
            <p>Discover music and videos by category</p>

        </section>

        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

            <?php
            $get_genres = mysqli_query(
                $connection,
                "SELECT genre,COUNT(*) as total FROM music GROUP BY genre ORDER BY total DESC"
            );
            ?>

            <!-- Genre Card 1 -->
            <section class="col">

                <a href="genre.php?genre=Pop" class="genre-link">
                    <section class="genre-card genre-1">

                        <h3>Pop</h3>
                        <i class="bi bi-music-note-beamed"></i>

                    </section>
                </a>

            </section>

            <!-- Genre Card 2 -->
            <section class="col">

                <a href="genre.php?genre=Pop Rock" class="genre-link">
                    <section class="genre-card genre-3">

                        <h3>Pop Rock</h3>
                        <i class="bi bi-vinyl-fill"></i>

                    </section>
                </a>

            </section>

            <!-- Genre Card 3 -->
            <section class="col">

                <a href="genre.php?genre=Sad Pop" class="genre-link">
                    <section class="genre-card genre-4">
                        <h3>Sad Pop</h3>
                        <i class="bi bi-mic-fill"></i>

                    </section>
                </a>

            </section>

            <!-- Genre Card 4 -->
            <section class="col">

                <a href="language.php?language=English" class="genre-link">
                    <section class="genre-card genre-5">

                        <h3>English</h3>
                        <i class="bi bi-disc-fill"></i>
                    </section>
                </a>

            </section>

            <!-- Genre Card 5 -->
            <section class="col">

                <a href="language.php?language=Urdu" class="genre-link">
                    <section class="genre-card genre-6">

                        <h3>Urdu</h3>
                        <i class="bi bi-boombox-fill"></i>

                    </section>
                </a>

            </section>

        </section>

    </section>

</section>


<?php

include("./includes/footer.php");

?>