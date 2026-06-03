<?php

include("./includes/config.php");
include("./includes/header.php");

if (!isset($_GET['language'])) {
    header("Location: index.php");
    exit();
}

$language = mysqli_real_escape_string(
    $connection,
    $_GET['language']
);

$get_music = mysqli_query(
    $connection,
    "SELECT * FROM music WHERE language = '$language' ORDER BY id DESC"
);

?>

<section class="popular-music py-5">

    <section class="container py-3">

        <section class="section-title text-center mb-5 artists-title">

            <h2><?php echo $language; ?> Songs</h2>

        </section>

        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

            <?php if (mysqli_num_rows($get_music) > 0) { ?>

                <?php while ($music = mysqli_fetch_assoc($get_music)) { ?>

                    <section class="col">

                        <section class="music-card">

                            <section class="music-img">
                                <img src="./uploads/images/<?php echo $music['image']; ?>" class="img-fluid" alt="Music">
                            </section>

                            <section class="music-content">

                                <h5><?php echo $music['title']; ?></h5>
                                <p><?php echo $music['artist']; ?></p>
                                <a href="music-details.php?id=<?php echo $music['id']; ?>" class="play-btn">Play Now</a>

                            </section>

                        </section>

                    </section>

                <?php } ?>

            <?php } else { ?>

                <section class="text-center text-white">

                    <h3>No Songs Found</h3>

                </section>

            <?php } ?>

        </section>

    </section>

</section>

<?php include("./includes/footer.php"); ?>