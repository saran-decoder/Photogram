<?php

if (Session::isAuthenticated()) {
    Session::loadTemplate('_header');
    Session::loadTemplate('index/calltoaction');
    Session::loadTemplate("index/photogram");
} else {
    Session::loadTemplate('signin/index');
}