<?php

include_once __DIR__ . "/../traits/SQLGetterSetter.trait.php";

use Carbon\Carbon; //including a namespace

class Post
{
    use SQLGetterSetter; //including a trait

    public $id;
    public $conn;
    public $table;

    public static function registerPost($text, $image_tmp)
    {
        if (is_file($image_tmp) and exif_imagetype($image_tmp) !== false) {
            $userid = Session::getUser()->getID();
            $author = Session::getUser()->getUsername();
            $image_name = md5($author.time()) . image_type_to_extension(exif_imagetype($image_tmp));
            $image_path = get_config('upload_path') . $image_name;
            if (move_uploaded_file($image_tmp, $image_path)) {
                $db = Database::getConnection();

                // Fetch the avatar value
                $avatarQuery = "SELECT `avatar` FROM `users` WHERE `owner` = '$author'";
                $avatarResult = $db->query($avatarQuery);
                $avatar = $avatarResult->fetch_assoc();
                
                $Useravatar = $avatar['avatar']; // Get the avatar value

                $image_uri = "/files/$image_name";
                $insert_command = "INSERT INTO `posts` (`userid`, `post_text`, `multiple_images`, `image_uri`, `avatar`, `uploaded_time`, `owner`) VALUES ('$userid', '$text', 0, '$image_uri', '$Useravatar', now(), '$author')";
                // die(var_dump($insert_command));
                if ($db->query($insert_command)) {
                    $id = mysqli_insert_id($db);
                    return new Post($id);
                } else {
                    echo "<script>window.location.href = '/Uploads?error'</script>";
                    return false;
                }
            }
        } else {
            throw new Exception("Image not uploaded");
        }
    }

    public function like()
    {
        try {
            $author = Session::getUser()->getUsername();
            $sql = "UPDATE `$this->table` SET `like_count` = like_count + 1 WHERE `id` = $this->id";
            $result = $this->conn->query($sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch(Exception $e) {
            throw new Exception(__CLASS__."::_set_data() -> , function unavailable.");
        }
    }

    public function unlike()
    {
        try {
            $author = Session::getUser()->getUsername();
            $sql = "UPDATE `$this->table` SET `like_count` = like_count - 1 WHERE `id` = '$this->id'";
            $result = $this->conn->query($sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch(Exception $e) {
            throw new Exception(__CLASS__."::_set_data() -> , function unavailable.");
        }
    }

    public static function getAllPosts()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM `posts` ORDER BY `uploaded_time` DESC";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }

    public static function getPostavatar()
    {
        $db = Database::getConnection();
        $owner = Session::getUser()->getUsername();
        $sql = "SELECT `avatar` FROM `users` WHERE `owner` = '$owner'";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }

    public static function getUserposts()
    {
        $username = $_GET['username'];
        $db = Database::getConnection();
        // $id = Session::getUser()->getID();
        $sql = "SELECT `image_uri` FROM `posts` WHERE `owner` = '$username'";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }

    public static function countAllPosts()
    {
        $db = Database::getConnection();
        $sql = "SELECT COUNT(*) as count FROM `posts` ORDER BY `uploaded_time` DESC";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }

    public function __construct($id)
    {
        $this->id = $id;
        $this->conn = Database::getConnection();
        $this->table = 'posts';
    }
}
