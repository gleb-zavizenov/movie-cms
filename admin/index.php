<?php
    require_once '../load.php';
    confirm_logged_in();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>!!! Admin Dashboard !!! <?php echo $_SESSION['user_name'] ?></h1>

    <br><br>
    <a href="admin_createuser.php">Create new User</a><br><br>
    <a href="admin_logout.php">Sign out</a>
</body>
</html>