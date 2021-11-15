<?php

    session_start();
    session_unset("user");
    header("Location: ../control/sign_in.php");

?>