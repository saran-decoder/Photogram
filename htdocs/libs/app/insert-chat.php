<!-- < ?php 
    if(isset($_SESSION['id'])){
        $conn = Database::getConnection();
        $id = Session::getUser()->getID();
        $owner = Session::getUser()->getUsername();
        // $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO `group_messages` (`group_id`, `sender_id`, `status`, `message`, `timestamp`, `owner`)
                                        VALUES (1, $id, 0, $message, now(), $owner)") or die();

$sql2 = "SELECT `id` FROM `group_messages` WHERE outgoing_msg_id = $outgoing_id";
$result = mysqli_query($conn, $sql2);
while($row = mysqli_fetch_assoc($result)){
    $latest_id = $row['msg_id'] ;
}

$sql3 = mysqli_query($conn, "UPDATE `friends` SET `last_msg_id` = '$latest_id' WHERE `unique_id` = $incoming_id OR `friend_id` = $incoming_id;") or die();

}

    else{
        header("location: /sendbox");
    }

}
?> -->


<?php

use SebastianBergmann\Exporter\Exporter;

if ($_SESSION['id'])
{
    $db = Database::getConnection();
    $userid = Session::getUser()->getID();
    $owner = Session::getUser()->getUsername();
    $message = mysqli_real_escape_string($db, $_POST['message']);
    $insert_group = "INSERT INTO `group_messages` (`group_id`, `sender_id`, `status`, `message`, `timestamp`, `owner`) VALUES (1, '$userid', 0, '$message', now(), '$owner')";
    if ($db->query($insert_group)) {
        $id = mysqli_insert_id($db);
        return new Group($id);
    } else {
        echo "<script>window.location.href = '/discussion?error'</script>";
        return false;
    }
} else {
    throw new Exporter("Some error this group message inserting process!");
}

?>