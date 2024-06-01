<!-- < ?php
include 'libs/load.php';

$conn = Database::getConnection();
$groupMessage = new GroupMessage($conn);

$groupId = 1;
$senderId = 1;
$message = "Hello World!";

$result = $groupMessage->sendGroupMessage($groupId, $senderId, $message);

if ($result) {
    echo "Group message send successfully!";
} else {
    echo "Error sending group message!";
}

?> -->

<?php

// session_start();

// // Function to store device information
// function storeDeviceInformation($userAgent) {
//     $_SESSION['device_info'] = $userAgent;
// }

// // Function to get device information
// function getDeviceInformation() {
//     return isset($_SESSION['device_info']) ? $_SESSION['device_info'] : 'Unknown Device';
// }

// // Simulate a user logging in
// $userAgent = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36";
// $hi = storeDeviceInformation($userAgent);

// echo($hi);

// require 'vendor/autoload.php';
// use Carbon\Carbon; //including a namespace
// use Carbon\CarbonInterval;


// function getPostTime($Time)
//     {
//         $interval = CarbonInterval::seconds($Time);
//         $formatted = '';
//         if ($interval->years) {
//             $formatted .= $interval->years . 'y ';
//         }

//         if ($interval->months) {
//             $formatted .= $interval->months . 'M ';
//         }

//         if ($interval->weeks) {
//             $formatted .= $interval->weeks . 'w ';
//         }

//         if ($interval->days) {
//             $formatted .= $interval->days . 'd ';
//         }

//         if ($interval->hours) {
//             $formatted .= $interval->hours . 'h ';
//         }

//         if ($interval->minutes) {
//             $formatted .= $interval->minutes . 'm ';
//         }

//         if ($interval->seconds) {
//             $formatted .= $interval->seconds . 's ';
//         }

//         return trim($formatted);
//     }

// $Times = '2020-11-28 13:17:38';

// $uploaded_time = Carbon::parse($Times);
// $Time = $uploaded_time->diffForHumans();

// // $formatted = getPostTime($Time);
// echo "Posted Time: $Time";