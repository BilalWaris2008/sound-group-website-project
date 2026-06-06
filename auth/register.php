<?php

include("../includes/config.php");
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Full Name Validation
    if (empty($fullname)) {
        $errors['fullname'] = "Full name is required.";
    }

    // Email Validation
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    // Password Validation
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }

    // Confirm Password Validation
    if (empty($confirm_password)) {
        $errors['confirm_password'] = "Confirm your password.";
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match.";
    }

    // Insert User

    if (empty($errors)) {

        // Check Email Already Exists

        $check_email = mysqli_query(
            $connection,
            "SELECT * FROM users WHERE email='$email'"
        );

        if (mysqli_num_rows($check_email) > 0) {
            $errors['email'] = "Email already exists.";
        } else {

            // Hash Password
            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            // Insert Query
            $insert_query = mysqli_query(
                $connection,
                "INSERT INTO users(
                fullname,
                email,
                password
            )

            VALUES(
                '$fullname',
                '$email',
                '$hashed_password'
            )"

            );

            if ($insert_query) {
                $success = "Registration Successful!";
            } else {
                $errors['email'] = "Something went wrong.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sound Group Register</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS Link -->
    <link rel="stylesheet" href="./account.css">
</head>

<body>

    <section class="register-container">

        <section class="register-card">

            <section class="logo">
                <h1>SOUND GROUP</h1>
                <h2>Create Account</h2>
            </section>

            <?php if ($success): ?>
                <section class="success-msg"><?php echo $success; ?></section>
            <?php endif; ?>

            <form method="POST">

                <!-- Full Name -->
                <section class="mb-3">
                    <label class="form-label">Full Name</label>

                    <section class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-user"></i>
                        </span>

                        <input type="text" name="fullname" class="form-control" placeholder="Enter your full name" value="<?php echo isset($fullname) ? htmlspecialchars($fullname) : ''; ?>">
                    </section>

                    <?php if (isset($errors['fullname'])): ?>
                        <section class="error-text"><?php echo $errors['fullname']; ?></section>
                    <?php endif; ?>
                </section>

                <!-- Email -->
                <section class="mb-3">
                    <label class="form-label">Email</label>

                    <section class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-envelope"></i>
                        </span>

                        <input type="email" name="email" class="form-control" placeholder="Enter your email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                    </section>

                    <?php if (isset($errors['email'])): ?>
                        <section class="error-text"><?php echo $errors['email']; ?></section>
                    <?php endif; ?>
                </section>

                <!-- Password -->
                <section class="mb-3">
                    <label class="form-label">Password</label>

                    <section class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-lock"></i>
                        </span>

                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                    </section>

                    <?php if (isset($errors['password'])): ?>
                        <section class="error-text"><?php echo $errors['password']; ?></section>
                    <?php endif; ?>
                </section>

                <!-- Confirm Password -->
                <section class="mb-3">
                    <label class="form-label">Confirm Password</label>

                    <section class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-key"></i>
                        </span>

                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password">
                    </section>

                    <?php if (isset($errors['confirm_password'])): ?>
                        <section class="error-text"><?php echo $errors['confirm_password']; ?></section>
                    <?php endif; ?>
                </section>

                <button type="submit" class="btn-register">Register</button>

            </form>

            <!-- Static Login Line -->
            <section class="login-line">If you already have an account
                <a href="login.php">Go to Login</a>
            </section>

        </section>

    </section>

</body>

</html>