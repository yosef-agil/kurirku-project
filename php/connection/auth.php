<?php

    session_start();
    if(!isset($_SESSION["user"])) header("Location: ../control/sign_in.php");

?>