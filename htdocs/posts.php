<?php

include 'libs/load.php';
// session_cache_limiter('none');
$upload_path = get_config('post_path');
$fname = $_GET['name'];
$image_path = $upload_path . $fname;
// echo $image_path;

//To prevent directory traversal vulnerablity
$image_path = str_replace('..', '', $image_path);

if (is_file($image_path)) {
    //TODO: Lot of security things to think about here
    //TODO: Check why caching is not working on client side.
    header("Content-Type:".mime_content_type($image_path));
    header("Content-Length:".filesize($image_path));
    header('Cache-control: max-age='.(60*60*24*365));
    header('Expires: '.gmdate(DATE_RFC1123, time()+60*60*24*365));
    header('Last-Modified: '.gmdate(DATE_RFC1123, filemtime($path_to_image)));
    header_remove('Pragma');
    echo file_get_contents($image_path);
}
