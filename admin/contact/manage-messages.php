<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../auth/login.php");
    exit();
}

if ($_SESSION['user_role'] != 'admin') {
    header("Location: ../../index.php");
    exit();
}

include("../../includes/config.php");

$get_messages = mysqli_query(
    $connection, "SELECT * FROM contact_messages ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Messages</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Links -->
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/manage.css">

</head>

<body>

    <section class="admin-wrapper">

        <?php include("../includes/sidebar.php"); ?>

        <section class="main-content">

            <section class="container-fluid py-4 manage-msg">

                <h1 class="mb-4">Manage Messages</h1>

                <section class="table-responsive">

                    <table class="table align-middle text-center">

                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php while ($message = mysqli_fetch_assoc($get_messages)) { ?>

                                <tr>

                                    <td><?php echo $message['id']; ?></td>
                                    <td><?php echo $message['fullname']; ?></td>
                                    <td><?php echo $message['email']; ?></td>
                                    <td><?php echo $message['subject']; ?></td>
                                    <td><?php echo substr($message['message'], 0, 50); ?>...</td>
                                    <td><?php echo $message['created_at']; ?></td>

                                    <td>
                                        <a href="delete-message.php?id=<?php echo $message['id']; ?>" class="btn btn-sm delete" onclick="return confirm('Delete Message?')">Delete</a>
                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </section>

            </section>

        </section>

    </section>

</body>

</html>