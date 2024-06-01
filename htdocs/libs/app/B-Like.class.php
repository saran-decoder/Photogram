<?php

include_once __DIR__."/../traits/SQLGetterSetter.trait.php";

class BlogLike
{
    use SQLGetterSetter;

    public $conn;
    public $table;
    public $blogid;
    public $userid;

    public function __construct($id)
    {
        $this->blogid = $id;
        $this->userid = Session::getUser()->getID();
        $this->conn = Database::getConnection();
        $this->table = 'b_likes';
    }

    // This is blog like functions
    public function ckeck_isliked()
    {
        $isLike = $this->is_liked();
        $like_count = new Post($this->blogid);
        if (is_array($isLike) && $isLike['owner'] == Session::getUser()->getUsername()) {
            if ($isLike['status'] == 'liked') {
                $this->update_status('unliked');
                $like_count->b_unlike();
                return true;
            } elseif ($isLike['status'] == 'unliked') {
                $this->update_status('liked');
                $like_count->b_like();
                return true;
            } else {
                return false;
            }
        } else {
            if (!is_array($isLike) || $isLike['owner'] != Session::getUser()->getUsername()) {
                $this->register_like();
                $like_count->b_like();
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
            $query = "SELECT * FROM `$this->table` WHERE `blog_id` = '$this->blogid' AND `owner` = '$owner'";
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
            $query = "UPDATE `$this->table` SET `status` = '$status' WHERE `blog_id` = '$this->blogid' AND `owner` = '$owner'";
            $result = $this->conn->query($query);
            
            if ($result === false) {
                // Handle the update failure here
                echo 'Failed to update blog status';
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
            throw new Exception('Error updating blog status: ' . $e->getMessage());
            return false;
        }
    }

    public function register_like()
    {
        try {
            $owner = Session::getUser()->getUsername();
            $query_insert = "INSERT INTO `$this->table` (`user_id`, `blog_id`, `status`, `timestamp`, `owner`)
            VALUES ('$this->userid', '$this->blogid', 'liked', now(), '$owner')";
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
