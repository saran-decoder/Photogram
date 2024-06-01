<?php

include_once __DIR__ . "/../traits/SQLGetterSetter.trait.php";

use Carbon\Carbon; //including a namespace

class Post
{
    use SQLGetterSetter; //including a trait

    public $id;
    public $conn;
    public $table;
    public $table2;
    public $table3;
    public $table4;

    public static function registerPost($text, $image_tmp)
    {
        $userid = Session::getUser()->getID();
        $author = Session::getUser()->getUsername();
        // Check if the uploaded file is an image
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_buffer($finfo, $image_tmp);

        if (strpos($mime_type, 'image/') !== 0) {
            finfo_close($finfo);
            throw new Exception('Invalid file type. Only images are allowed.');
        }

        finfo_close($finfo);

        $extensions = ['jpg', 'jpeg', 'png']; // Add other valid image extensions
        $randomExtension = $extensions[array_rand($extensions)];

        $image_name = md5($author . time()) . '.' . $randomExtension;
        $image_path = get_config('post_path') . $image_name;
        if (file_put_contents($image_path, $image_tmp)) {
            $db = Database::getConnection();

            // Fetch the avatar value
            $avatarQuery = "SELECT `avatar` FROM `users` WHERE `owner` = '$author'";
            $avatarResult = $db->query($avatarQuery);
            $avatar = $avatarResult->fetch_assoc();
            
            $Useravatar = $avatar['avatar']; // Get the avatar value

            $image_uri = "/files/$image_name";
            $insert_command = "INSERT INTO `posts` (`userid`, `post_text`, `multiple_images`, `image_uri`, `avatar`, `like_count`, `uploaded_time`, `owner`) VALUES ('$userid', '$text', 0, '$image_uri', '$Useravatar', 0, now(), '$author')";

            if ($db->query($insert_command)) {
                $id = mysqli_insert_id($db);
                return new Post($id);
            } else {
                throw new Exception("Error while trying to insert post into database.");
            }
        }
    }

    public static function registerBlog($title, $text, $image_tmp)
    {
        $userid = Session::getUser()->getID();
        $author = Session::getUser()->getUsername();
        // Check if the uploaded file is an image
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_buffer($finfo, $image_tmp);

        if (strpos($mime_type, 'image/') !== 0) {
            finfo_close($finfo);
            throw new Exception('Invalid file type. Only images are allowed.');
        }

        finfo_close($finfo);

        $extensions = ['jpg', 'jpeg', 'png']; // Add other valid image extensions
        $randomExtension = $extensions[array_rand($extensions)];

        $image_name = md5($author . time()) . '.' . $randomExtension;
        $image_path = get_config('blog_path') . $image_name;
        if (file_put_contents($image_path, $image_tmp)) {
            $conn = Database::getConnection();
            $banner_uri = "/filesb/$image_name";
            $insert_command = "INSERT INTO `blogs` (`userid`, `banner`, `title`, `content`, `like_count`, `uploaded_time`, `author`) VALUES ('$userid', '$banner_uri', '$title', '$text', 0, now(), '$author');";

            if ($conn->query($insert_command)) {
                $id = mysqli_insert_id($conn);
                return new Post($id);
            } else {
                throw new Exception("Error while trying to insert blog into database.");
            }
        }
    }


    public function like()
    {
        try {
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

    public function delete()
    {
        try {
            //TODO: Delete the image before deleting the post entry
            $sql = "DELETE FROM `$this->table` WHERE `id`=$this->id;";
            if ($this->conn->query($sql)) {
                $like_sql = "DELETE FROM `$this->table2` WHERE `post_id`=$this->id;";
                if ($this->conn->query($like_sql)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception(__CLASS__."::delete, data unavailable.");
        }
    }

    public function B_like()
    {
        try {
            $sql = "UPDATE `$this->table3` SET `like_count` = like_count + 1 WHERE `id` = $this->id";
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

    public function B_unlike()
    {
        try {
            $sql = "UPDATE `$this->table3` SET `like_count` = like_count - 1 WHERE `id` = '$this->id'";
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

    public function B_delete()
    {
        try {
            //TODO: Delete the image before deleting the post entry
            $sql = "DELETE FROM `$this->table3` WHERE `id`=$this->id;";
            if ($this->conn->query($sql)) {
                $like_sql = "DELETE FROM `$this->table4` WHERE `blog_id`=$this->id;";
                if ($this->conn->query($like_sql)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception(__CLASS__."::delete, data unavailable.");
        }
    }


    public static function getAllPosts()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM `posts` ORDER BY `uploaded_time` DESC";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }

    public static function getAllBlogs()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM `blogs` ORDER BY `uploaded_time` DESC";
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
        $sql = "SELECT * FROM `posts` WHERE `owner` = '$username'";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }
    public static function getUserblogs()
    {
        $username = $_GET['username'];
        $db = Database::getConnection();
        $sql = "SELECT * FROM `blogs` WHERE `author` = '$username'";
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
        $this->table2 = 'likes';
        $this->table3 = 'blogs';
        $this->table4 = 'b_likes';
    }
}
