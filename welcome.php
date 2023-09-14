<?php
    session_start();
    include 'connect.php';
    if (isset($_COOKIE["user_id"])) {
        header("Location: index.php");
    }else{
        $query = "SELECT COUNT(*) as total FROM users";
        $result = $mysqli -> query($query);
        $user = mysqli_fetch_assoc($result);
        $count = $user['total'];
        $count++;
        $query = $query = "INSERT INTO users (user_id) VALUES ('$count')";
        $result = $mysqli -> query($query);
        setcookie(
            "user_id",
            "$count",
            time() + (10 * 365 * 24 * 60 * 60)
        );
        header("Location: index.php");
    }
?>