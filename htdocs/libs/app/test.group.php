<?php

class GroupMessage {
    
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function sendGroupMessage($groupId, $senderId, $message) {
        $sql = "INSERT INTO `group_message` (`group_id`, `sender_id`, `message`) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param("iis", $groupId, $senderId, $message);

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function receiveGroupMessage($groupId) {
        $sql = "SELECT `sender_id`, `message`, `timestamp` FROM `group_message` WHERE `group_id` = ? ORDER BY `timestamp` ASC";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param("i", $groupId);
        $stmt->execute();
        $result = $stmt->get_result();
        $message = [];

        while ($row = $result->fetch_assoc()) {
            $message[] = $row;
        }

        $stmt->close();

        return $message;
    }

}