<?php

include("./includes/config.php");
include("./includes/header.php");

$genre = mysqli_real_escape_string(
    $connection,
    $_GET['genre']
);

$get_music = mysqli_query(
    $connection, "SELECT * FROM music WHERE genre = '$genre' ORDER BY id DESC"
);

?>

<section class="py-5">

    <div class="container py-3">

        <div class="text-center mb-5 artists-title">

            <h2 class="text-white"><?php echo $genre; ?> Music</h2>

        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

            <?php while($music = mysqli_fetch_assoc($get_music)){ ?>

                <div class="col">

                    <div class="music-card">

                        <div class="music-img">

                            <img src="./uploads/images/<?php echo $music['image']; ?>" class="img-fluid">

                        </div>

                        <div class="music-content">

                            <h5><?php echo $music['title']; ?></h5>
                            <p><?php echo $music['artist']; ?></p>
                            <a href="music-details.php?id=<?php echo $music['id']; ?>" class="play-btn">Play Now</a>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

    </div>

</section>

<?php include("./includes/footer.php"); ?>