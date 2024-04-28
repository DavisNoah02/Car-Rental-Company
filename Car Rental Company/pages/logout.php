<?php
    session_start();

    // Destroy the session
    session_destroy();

    // Redirect the user back to the main page
    header("Location: index.php");
    exit();
?>
