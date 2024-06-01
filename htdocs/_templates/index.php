<?php

if (Session::isAuthenticated()) {
    ?>
    <main class="d-flex flex-nowrap vh-100">
    <?php
        Session::loadTemplate('_header');
        Session::loadTemplate("index/photogram");
        Session::loadTemplate("index/search");
    ?>
    </main>
    <?php
} else {
    Session::loadTemplate('signin/index');
}
?>