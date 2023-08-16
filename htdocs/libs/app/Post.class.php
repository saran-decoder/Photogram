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
            $userid = md5(Session::getUser()->getID());
            $author = Session::getUser()->getUsername();
            $image_name = md5($author.time()) . image_type_to_extension(exif_imagetype($image_tmp));
            $image_path = get_config('upload_path') . $image_name;
            if (move_uploaded_file($image_tmp, $image_path)) {
                $image_uri = "/files/$image_name";
                $insert_command = "INSERT INTO `posts` (`userid`, `post_text`, `multiple_images`, `image_uri`, `like_count`, `uploaded_time`, `owner`) VALUES ('$userid', '$text', 0, '$image_uri', '0', now(), '$author')";
                $db = Database::getConnection();
                if ($db->query($insert_command)) {
                    $id = mysqli_insert_id($db);
                    return new Post($id);
                } else {
                    return false;
                }
            }
        } else {
            throw new Exception("Image not uploaded");
        }
    }

    public static function getAllPosts()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM `posts` ORDER BY `uploaded_time` DESC";
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
