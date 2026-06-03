<?php

include("./includes/config.php");
include("./includes/header.php");

$id = $_GET['id'];

$get_music = mysqli_query(
    $connection, "SELECT * FROM music WHERE id = '$id'"
);

$music = mysqli_fetch_assoc($get_music);

$get_reviews = mysqli_query(
    $connection,
    "SELECT reviews.*, users.fullname FROM reviews INNER JOIN users
     ON reviews.user_id = users.id WHERE music_id = '$id'
     ORDER BY reviews.id DESC"
);

$related_music = mysqli_query(
    $connection,
    "SELECT * FROM music WHERE id != '$id' ORDER BY RAND() LIMIT 4"
);

?>

<link rel="stylesheet" href="./css/details.css">

<body>

    <section class="container py-5">

        <section class="row py-5">

            <section class="col-md-4">
                <img src="./uploads/images/<?php echo $music['image']; ?>" class="img-fluid rounded">
            </section>

            <section class="col-md-8">

                <h1><?php echo $music['title']; ?></h1>
                <h5><?php echo $music['artist']; ?></h5>

                <section class="music-meta">

                    <span>Album: <?php echo $music['album']; ?></span>
                    <span>Genre: <?php echo $music['genre']; ?></span>
                    <span>Year: <?php echo $music['year']; ?></span>
                    <span>Language: <?php echo $music['language']; ?></span>

                </section>

                <p><?php echo $music['description']; ?></p>
                <h4 class="mt-4 mb-3">Listen Now</h4>

                <?php if (isset($_SESSION['user_id'])) { ?>

                    <form action="submit-music-review.php" method="POST">

                        <input type="hidden" name="music_id" value="<?php echo $music['id']; ?>">

                        <div class="mb-3 review-rating">

                            <p>Rating</p>

                            <select name="rating" class="form-control">

                                <option value="5">★★★★★</option>
                                <option value="4">★★★★☆</option>
                                <option value="3">★★★☆☆</option>
                                <option value="2">★★☆☆☆</option>
                                <option value="1">★☆☆☆☆</option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <textarea name="review" class="form-control" rows="4" placeholder="Write your review..." required></textarea>

                        </div>

                        <button type="submit" class="play-btn">Submit Review</button>

                    </form>

                <?php } ?>

                <div class="reviews-section mt-5">

                    <h3 class="mb-4">User Reviews</h3>

                    <?php if (mysqli_num_rows($get_reviews) > 0) { ?>

                        <?php while ($review = mysqli_fetch_assoc($get_reviews)) { ?>

                            <div class="review-card mb-3 p-3">

                                <h5><?php echo $review['fullname']; ?></h5>
                                <p><?php echo str_repeat("⭐", $review['rating']); ?></p>
                                <p><?php echo $review['review']; ?></p>

                            </div>

                        <?php } ?>

                    <?php } else { ?>

                        <p>No reviews yet.</p>

                    <?php } ?>

                </div>

                <audio controls class="w-100">
                    <source src="./uploads/music/<?php echo $music['music_file']; ?>">
                </audio>

            </section>

        </section>


        <section class="container related-songs">

            <h3 class="text-center">Related Songs</h3>

            <section class="row mt-4">

                <?php while ($related = mysqli_fetch_assoc($related_music)) { ?>

                    <section class="col-lg-3 col-md-4 col-sm-6 mb-4">

                        <section class="related-card">

                            <img src="./uploads/images/<?php echo $related['image']; ?>" class="img-fluid">

                            <section class="related-content">

                                <h6><?php echo $related['title']; ?></h6>
                                <p><?php echo $related['artist']; ?></p>
                                <a href="music-details.php?id=<?php echo $related['id']; ?>" class="related-btn">Play Now</a>

                            </section>

                        </section>

                    </section>

                <?php } ?>

            </section>

        </section>

    </section>

    <?php

    include("./includes/footer.php");

    ?>