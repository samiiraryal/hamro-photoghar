<?php

        session_start();
        session_destroy();
        echo "Check";
        header("location: login.php");

?>