<?php
// Start the session
session_start();

// Destroy the session
session_destroy();

// Clear a specific cookie
setcookie('user_id', '', time() - 3600);

// Clear the session cookie
setcookie('PHPSESSID', '', time() - 3600, '/');
echo "<script>
    alert('Session & cookie destroyed.');
    </script>";
?>