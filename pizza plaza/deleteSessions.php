<?php
    session_start();

    //unsert session
    unset($_SESSION['username']);

    //destroy session
    session_destroy();

?>