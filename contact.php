<?php

include("./includes/config.php");
include("./includes/header.php");

$success = "";
$errors = [];

if (isset($_POST['submit'])) {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (empty($fullname)) {
        $errors['fullname'] = "Full Name is required";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    if (empty($subject)) {
        $errors['subject'] = "Subject is required";
    }

    if (empty($message)) {
        $errors['message'] = "Message is required";
    } elseif (strlen($message) < 10) {
        $errors['message'] = "Message must be at least 10 characters";
    }

    if (empty($errors)) {
        $fullname = mysqli_real_escape_string($connection, $fullname);
        $email = mysqli_real_escape_string($connection, $email);
        $subject = mysqli_real_escape_string($connection, $subject);
        $message = mysqli_real_escape_string($connection, $message);

        mysqli_query(
            $connection,
            "INSERT INTO contact_messages
            (fullname,email,subject,message)
            VALUES
            ('$fullname','$email','$subject','$message')"
        );
        $success = "Message sent successfully!";
    }
}

?>

<link rel="stylesheet" href="./css/contact.css">

<section class="contact-banner d-flex align-items-center">

    <section class="container">

        <h1>Contact Us</h1>

    </section>

</section>

<section class="contact-section">

    <section class="container">

        <section class="row g-4">

            <!-- Contact Info -->

            <section class="col-lg-5">

                <section class="contact-info-card">

                    <h2>Get In Touch</h2>
                    <p>Feel free to contact us anytime forsupport, feedback or suggestions.</p>

                    <section class="info-box">

                        <i class="fa-solid fa-envelope"></i>

                        <section>
                            <h5>Email</h5>
                            <p>support@soundgroup.com</p>
                        </section>

                    </section>

                    <section class="info-box">

                        <i class="fa-solid fa-phone"></i>

                        <section>
                            <h5>Phone</h5>
                            <p>+92 300 1234567</p>
                        </section>

                    </section>

                    <section class="info-box">

                        <i class="fa-solid fa-location-dot"></i>

                        <section>
                            <h5>Location</h5>
                            <p>Karachi, Pakistan</p>
                        </section>

                    </section>

                </section>

            </section>

            <!-- Form -->

            <section class="col-lg-7">

                <section class="contact-form-card">

                    <h2>Send Message</h2>

                    <?php if ($success) { ?>
                        <section class="success-msg"><?php echo $success; ?></section>
                    <?php } ?>

                    <form method="POST">

                        <section class="row">

                            <section class="col-md-6">

                                <input type="text" name="fullname" class="form-control contact-input" value="<?php echo isset($fullname) ? htmlspecialchars($fullname) : ''; ?>" placeholder="Full Name">

                                <?php if (isset($errors['fullname'])) { ?>
                                    <small class="error-text"><?php echo $errors['fullname']; ?></small>
                                <?php } ?>

                            </section>

                            <section class="col-md-6">

                                <input type="email" name="email" class="form-control contact-input" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" placeholder="Email">

                                <?php if (isset($errors['email'])) { ?>
                                    <small class="error-text"><?php echo $errors['email']; ?></small>
                                <?php } ?>

                            </section>

                        </section>

                        <input type="text" name="subject" class="form-control contact-input" value="<?php echo isset($subject) ? htmlspecialchars($subject) : ''; ?>" placeholder="Subject">

                        <?php if (isset($errors['subject'])) { ?>
                            <small class="error-text"><?php echo $errors['subject']; ?></small>
                        <?php } ?>

                        <textarea name="message" rows="6" class="form-control contact-input" value="<?php echo isset($subject) ? htmlspecialchars($subject) : ''; ?>" placeholder="Your Message"></textarea>

                        <?php if (isset($errors['message'])) { ?>
                            <small class="error-text"><?php echo $errors['message']; ?></small>
                        <?php } ?>

                        <button type="submit" name="submit" class="btn-send">Send Message</button>

                    </form>

                </section>

            </section>

        </section>

    </section>

</section>

<?php include("./includes/footer.php"); ?>