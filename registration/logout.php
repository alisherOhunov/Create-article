<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    session_unset();
    unset($_SESSION['username']);
}

header("Location: ../index.php");
exit;