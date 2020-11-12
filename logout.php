<?php

    session_start();
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    unset($_SESSION['userphone']);
    unset($_SESSION['useremail']);

    echo ("
        <script>
            location.href = 'index.php';
        </script>
    ");

?>