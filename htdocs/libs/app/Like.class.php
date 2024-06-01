<?php

include_once __DIR__."/../traits/SQLGetterSetter.trait.php";

class Like
{
    use SQLGetterSetter;

    public $conn;
    public $table;
    public $postid;
    public $userid;

    public function __construct($id)
    {
        $this->postid = $id;
        $this->userid = Session::getUser()->getID();
        $this->conn = Database::getConnection();
        $this->table = 'likes';
    }

    public function ckeck_isliked()
    {
        $isLike = $this->is_liked();
        $like_count = new Post($this->postid);
        if (is_array($isLike) && $isLike['owner'] == Session::getUser()->getUsername()) {
            if ($isLike['status'] == 'liked') {
                $this->update_status('unliked');
                $like_count->unlike();
                return true;
            } elseif ($isLike['status'] == 'unliked') {
                $this->update_status('liked');
                $like_count->like();
                return true;
            } else {
                return false;
            }
        } else {
            if (!is_array($isLike) || $isLike['owner'] != Session::getUser()->getUsername()) {
                $this->register_like();
                $like_count->like();
                return true;
            } else {
                return false;
            }
        }
    }

    public function is_liked()
    {
        try {
            $conn = Database::getConnection();
            $owner = Session::getUser()->getUsername();
            $query = "SELECT * FROM `$this->table` WHERE `post_id` = '$this->postid' AND `owner` = '$owner'";
            $result = $conn->query($query);

            if ($result !== false && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            } else {
                return false;
            }
        } catch(Exception $e) {
            return false;
        }
    }

    public function update_status($status)
    {
        try {
            $owner = Session::getUser()->getUsername();
            $query = "UPDATE `$this->table` SET `status` = '$status' WHERE `post_id` = '$this->postid' AND `owner` = '$owner'";
            $result = $this->conn->query($query);
            
            if ($result === false) {
                // Handle the update failure here
                return false;
            }
            
            // Check the number of affected rows
            $affectedRows = $this->conn->affected_rows;

            if ($affectedRows > 0) {
                // Update was successful
                return true;
            } else {
                // No rows were updated
                return false;
            }
        } catch(Exception $e) {
            return false;
        }
    }

    public function register_like()
    {
        try {
            $owner = Session::getUser()->getUsername();
                $query_insert = "INSERT INTO `$this->table` (`user_id`, `post_id`, `status`, `timestamp`, `owner`)
                VALUES ('$this->userid', '$this->postid', 'liked', now(), '$owner')";
                $result = $this->conn->query($query_insert);
                if (!$result) {
                    throw new Exception("Unable to create like entry.");
                }
        } catch (Exception $e) {
            // Handle the exception, log it, or display an error message.
            echo "Error: " . $e->getMessage();
        }
    }
    
}
