<?php

//TODO: Implement autoload of class files
require 'vendor/autoload.php';
include_once 'includes/Session.class.php';
include_once 'includes/User.class.php';
include_once 'includes/Database.class.php';
include_once 'includes/UserSession.class.php';
include_once 'includes/WebAPI.class.php';
include_once 'app/Post.class.php';
include_once 'includes/REST.class.php';
include_once 'includes/API.class.php';
include_once 'app/Profile.class.php';
include_once 'app/Like.class.php';
include_once 'app/B-Like.class.php';
include_once 'app/Group.class.php';

include_once 'app/test.group.php';

// global $__site_config;
/*
Note: Location of configuration
in lab : /home/user/phtogramconfig.json
in server: /var/www/photogramconfig.json
*/


$wapi = new WebAPI();
$wapi->initiateSession();

function get_config($key, $default=null)
{
    global $__site_config;
    $array = json_decode($__site_config, true);
    if (isset($array[$key])) {
        return $array[$key];
    } else {
        return $default;
    }
}

function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT'] . get_config('base_path'). "_templates/$name.php"; //not consistant.
}

// function validate_credentials($username, $password)
// {
//     if ($username == "saran@selfmade.ninja" and $password == "password") {
//         return true;
//     } else {
//         return false;
//     }
// }
