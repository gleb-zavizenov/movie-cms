<?php 

    require_once '../load.php';
    confirm_logged_in();

    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if(empty($fname) || empty($username) || empty($password) || empty($email)){
            $message = "Please fill all required fields!";
        } else {
            $message = createUser($fname, $username, $password, $email);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create user</title>
</head>
<body>
    <h2>Create user<h2>
    <br>
    <br>
    <?php echo !empty($message)? $message : ''; ?>
    <form action="admin_createuser.php" method="post">
        <label>First name:</label>
        <input type="text" name="fname" value="" required ><br><br>
        <label>Username:</label>
        <input type="text" name="username" value=""><br><br>
        <label>Password:</label>
        <input type="text" name="password" value=""><br><br>
        <label>Email:</label>
        <input type="email" name="email" value=""><br><br>

        <button type="submit" name="submit">Create User</button>
    </form>
</body>
</html>