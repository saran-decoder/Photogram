<?php

include 'libs/load.php';
// echo "Hello world";
if(Session::isAuthenticated()){
    header("Location: /");
    die();
}

Session::renderPage();
