<?php

include("./includes/config.php");
include("./includes/header.php");

$get_artists = mysqli_query(
    $connection,
    "SELECT artist, COUNT(*) as total_songs FROM music GROUP BY artist ORDER BY artist ASC"
);

?>

<section class="artists-section">

    <section class="container">

        <section class="artists-title">

            <h2>Popular Artists</h2>
            <p>Listen to songs from your favorite artists</p>

        </section>

        <section class="row g-4 justify-content-center">

            <!-- Artist Card 1 -->

            <section class="col-lg-3 col-md-6 col-sm-6">

                <a href="artist-details.php?artist=Kaifi%20Khalil" class="artist-link">
                    <section class="artist-card">

                        <img src="./assets/music/musicimg1.png" alt="Artist">
                        <h5>Kaifi Khalil</h5>
                        <span>Artist</span>

                    </section>
                </a>

            </section>

            <!-- Artist Card 2 -->

            <section class="col-lg-3 col-md-6 col-sm-6">

                <a href="artist-details.php?artist=One%20Direction" class="artist-link">
                    <section class="artist-card">

                        <img src="./assets/artists/onedirection.png" alt="Artist">
                        <h5>One Direction</h5>
                        <span>Pop Artist</span>

                    </section>
                </a>

            </section>

            <!-- Artist Card 3 -->

            <section class="col-lg-3 col-md-6 col-sm-6">

                <a href="artist-details.php?artist=AUR" class="artist-link">
                    <section class="artist-card">

                        <img src="./assets/artists/aur.png" alt="Artist">
                        <h5>AUR</h5>
                        <span>Singer</span>

                    </section>
                </a>

            </section>

            <!-- Artist Card 4 -->

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

<?php include("./includes/footer.php"); ?>