<?php
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

?>