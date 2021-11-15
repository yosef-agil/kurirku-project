<?php

    session_start();
    session_unset("user");
    header("Location: ../control/sign_in_user.php");

?>