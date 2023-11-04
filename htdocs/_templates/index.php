<?php

if (Session::isAuthenticated()) {
    Session::loadTemplate('_header');
    Session::loadTemplate("index/photogram");
    // Session::loadTemplate("index/comment");
} else {
    Session::loadTemplate('signin/index');
}