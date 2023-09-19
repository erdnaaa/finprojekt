<?php
include 'connect.php';
// Start a session to track user login status
session_start();

// Function to sanitize user input

// Check if the login form is submitted
if (isset($_POST['login'])) {
    // Get user input and sanitize it
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch user from the database
    $sql = "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, set session variables and redirect
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        echo "<script>alert('added');</script>";
        header("Location: admin.php"); // Redirect to the dashboard page
    } else {
        // Login failed, show an error message
        $error = "Invalid username or password";
    }
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head>
        <script src="./assets/js/color-modes.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <meta name="theme-color" content="#712cf9">
        <!-- Custom styles for this template -->
        <link href="./assets/login.css" rel="stylesheet">
    </head>
    <body class="d-flex align-items-center py-4 bg-body-tertiary">
        <main class="form-signin w-100 m-auto">
        <?php
            if (isset($error)) {
                echo "<p style='color: red;'>$error</p>";
            }
        ?>
            <form method="POST">
                <center>
                    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                </center>
                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="admin">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="btn btn-primary w-100 py-2" name="login" type="submit">Sign in</button>
            </form>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>