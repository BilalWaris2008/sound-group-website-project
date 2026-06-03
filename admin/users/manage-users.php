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

$get_users = mysqli_query(
    $connection, "SELECT * FROM users ORDER BY id"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
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

            <section class="container-fluid py-4">

                <section class="page-header mb-4">

                    <h1>Manage Users</h1>

                </section>

                <section class="table-responsive">

                    <table class="table align-middle text-center">

                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php while ($user = mysqli_fetch_assoc($get_users)) { ?>

                                <tr>

                                    <td><?php echo $user['id']; ?></td>
                                    <td><?php echo $user['fullname']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo ucfirst($user['role']); ?></td>
                                    <td><?php echo $user['created_at']; ?></td>

                                    <td>
                                        <?php if ($user['role'] != 'admin') { ?>
                                            <a href="delete-user.php?id=<?php echo $user['id']; ?>" class="btn btn-sm delete" onclick="return confirm('Delete this user?')">Delete</a>

                                        <?php } else { ?>
                                            <span class="btn bg-success text-white">Admin</span>
                                        <?php } ?>
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