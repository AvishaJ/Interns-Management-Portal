<?php
    include "conn.php";
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);

    $sql0 =  "SELECT * FROM admin WHERE name='".$name."' AND pass='".$pass."'";
    $result = $conn->query($sql0);

    if (($result->num_rows) > 0) {
        $_SESSION['isAdminValid'] = true;
        $_SESSION['LAST_ACTIVITY'] = time();
        header("location:manage.php");
    }
    else {
        session_destroy();
        die(header("location:login.php"));
        
    }
?>
