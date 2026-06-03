<?php

include("./includes/config.php");
include("./includes/header.php");

$id = $_GET['id'];

$get_video = mysqli_query(
    $connection, "SELECT * FROM videos WHERE id = '$id'"
);

$video = mysqli_fetch_assoc($get_video);

$get_reviews = mysqli_query(
    $connection,
    "SELECT reviews.*, users.fullname FROM reviews INNER JOIN users
     ON reviews.user_id = users.id WHERE video_id = '$id'
     ORDER BY reviews.id DESC"
);

$related_videos = mysqli_query(
    $connection,
    "SELECT * FROM videos WHERE id != '$id' ORDER BY RAND() LIMIT 4"
);

?>

<link rel="stylesheet" href="./css/details.css">

<section class="container py-5">

    <section class="row">

        <section class="row g-4 align-items-start">

            <section class="col-md-6">

                <video controls class="video-player w-100">
                    <source src="./uploads/videos/<?php echo $video['video_file']; ?>" type="video/mp4">
                </video>

            </section>

            <section class="col-md-6">

                <h1 class="details-heading"><?php echo $video['title']; ?></h1>
                <h5><?php echo $video['artist']; ?></h5>

                <section class="music-meta">

                    <span>Album: <?php echo $video['album']; ?></span>
                    <span>Genre: <?php echo $video['genre']; ?></span>
                    <span>Year: <?php echo $video['year']; ?></span>
                    <span>Language: <?php echo $video['language']; ?></span>

                </section>

                <section>
                    <p><?php echo nl2br($video['description']); ?></p>
                </section>

                <?php if (isset($_SESSION['user_id'])) { ?>

                    <div class="review-form mt-5 review-rating">

                        <h3>Add Review</h3>

                        <form action="submit-video-review.php" method="POST">

                            <input type="hidden" name="video_id" value="<?php echo $video['id']; ?>">

                            <div class="mb-3">

                                <p class="form-label mb-2">Rating</p>

                                <select name="rating" class="form-control">

                                    <option value="5">★★★★★</option>
                                    <option value="4">★★★★☆</option>
                                    <option value="3">★★★☆☆</option>
                                    <option value="2">★★☆☆☆</option>
                                    <option value="1">★☆☆☆☆</option>

                                </select>

                            </div>

                            <div class="mb-3">

                                <textarea name="review" rows="4" class="form-control" required placeholder="Write your review"></textarea>

                            </div>

                            <button type="submit" class="play-btn">Submit Review</button>

                        </form>

                    </div>

                <?php } ?>

                <div class="reviews-section mt-5">

                    <h3>User Reviews</h3>

                    <?php if (mysqli_num_rows($get_reviews) > 0) { ?>

                        <?php while ($review = mysqli_fetch_assoc($get_reviews)) { ?>

                            <div class="review-card">

                                <h5><?php echo $review['fullname']; ?></h5>
                                <p><?php echo str_repeat("⭐", $review['rating']); ?></p>
                                <p><?php echo $review['review']; ?></p>

                            </div>

                        <?php } ?>

                    <?php } else { ?>

                        <p class="text-white">No reviews yet.</p>

                    <?php } ?>

                </div>

            </section>

        </section>

    </section>

    <!-- Related Videos -->

    <section class="container related-songs">

        <h3 class="mb-4 text-center">Related Videos</h3>

        <section class="row mt-4">

            <?php while ($related = mysqli_fetch_assoc($related_videos)) { ?>

                <section class="col-lg-3 col-md-4 col-sm-6 mb-4">

                    <section class="related-card">

                        <section class="music-img">

                            <img src="./uploads/images/<?php echo $related['image']; ?>" class="w-100">

                            <section class="video-play-icon">
                                <a href="video-details.php?id=<?php echo $related['id']; ?>">
                                    <i class="bi bi-play-fill"></i>
                                </a>
                            </section>

                        </section>

                        <section class="music-content">

                            <h5><?php echo $related['title']; ?></h5>
                            <p><?php echo $related['artist']; ?></p>
                            <a href="video-details.php?id=<?php echo $related['id']; ?>" class="play-btn">Watch Now</a>

                        </section>

                    </section>

                </section>

            <?php } ?>

        </section>

    </section>

</section>

<?php include("./includes/footer.php"); ?>