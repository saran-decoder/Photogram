<pre>
<?php
// setcookie("testcookie", "testvalue", time() + (86400 * 30), "/");
include 'libs/load.php';

print("_SESSION \n");
print_r($_SESSION);
print("_SERVER \n");
print_r($_SERVER);
print("_FILES \n");
print_r($_FILES);
print("_COOKIE \n");
print_r($_COOKIE);
print("_REQUEST \n");
print_r($_REQUEST);
print("_GET \n");
print_r($_GET);
print("_POST \n");
print_r($_POST);
print("_ENV \n");
print_r($_ENV);
print("_GLOBALS \n");
print_r($GLOBALS);
print("getallheaders() \n");



// if (isset($_GET['clear'])) {
//     printf("Clearing...\n");
//     Session::unset();
// }

// if (Session::isset('a')) {
//     printf("A already exists... Value: ".Session::get('a')."\n");
// } else {
//     Session::set('a', time());
//     printf("Assigning new value... Value: $_SESSION[a]\n");
// }

// if (isset($_GET['destroy'])) {
//     printf("Destroying...\n");
//     Session::destroy();
// }




?></pre>