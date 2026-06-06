<?php

include("./includes/config.php");
include("./includes/header.php");

?>

<section class="popular-music py-5">

    <section class="container py-3">

        <section class="artists-title text-center mb-5">

            <h2>Albums</h2>
            <p>Browse songs by album</p>

        </section>

        <section class="row g-4 justify-content-center">

            <!-- Album 1 -->

            <section class="col-lg-3 col-md-6 col-sm-6 col-10">

                <section class="music-card">

                    <section class="music-img">
                        <img src="./assets/albums/divide.png" class="img-fluid">
                    </section>

                    <section class="music-content">

                        <h5>Divide</h5>
                        <p>Ed Sheeran</p>
                        <a href="album-details.php?album=Divide" class="play-btn">View Album</a>

                    </section>

                </section>

            </section>

            <!-- Album 2 -->

            <section class="col-lg-3 col-md-6 col-sm-6 col-10">

                <section class="music-card">

                    <section class="music-img">
                        <img src="./assets/albums/kahanisuno.png" class="img-fluid">
                    </section>

                    <section class="music-content">

                        <h5>Kahani Suno 2.0</h5>
                        <p>Kaifi Khalil</p>
                        <a href="album-details.php?album=Kahani Suno 2.0" class="play-btn">View Album</a>

                    </section>

                </section>

            </section>

            <!-- Album 3 -->

            <section class="col-lg-3 col-md-6 col-sm-6 col-10">

                <section class="music-card">

                    <section class="music-img">
                        <img src="./assets/albums/aur.png" class="img-fluid">
                    </section>

                    <section class="music-content">

                        <h5>AUR</h5>
                        <p>AUR</p>
                        <a href="album-details.php?album=AUR" class="play-btn">View Album</a>

                    </section>

                </section>

            </section>

            <!-- Album 4 -->

            <section class="col-lg-3 col-md-6 col-sm-6 col-10">

                <section class="music-card">

                    <section class="music-img">
                        <img src="./assets/albums/four.png" class="img-fluid">
                    </section>

                    <section class="music-content">

                        <h5>Four</h5>
                        <p>One Direction</p>
                        <a href="album-details.php?album=Four" class="play-btn">View Album</a>

                    </section>

                </section>

            </section>

        </section>

    </section>

</section>

</section>

<?php include("./includes/footer.php"); ?>