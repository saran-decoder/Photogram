<?php

include_once __DIR__ . "/../traits/SQLGetterSetter.trait.php";

use Carbon\Carbon; //including a namespace

class Dream
{
    use SQLGetterSetter; //including a trait

    public $id;
    public $userid;
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
                $dreamimage = "/dreams/".$image_name;
                $insert_command = "INSERT INTO `dream` (`userid`, `dreamimage`, `uploaded_time`, `owner`) VALUES ('$userid', '$dreamimage', now(), '$author')";
                // die(var_dump($insert_command));
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

    public static function getAllDreams()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM `dream` ORDER BY `uploaded_time` DESC";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }

    // public static function getAllDreams()
    // {
    //     $db = Database::getConnection();
    //     $sql = "SELECT * FROM `dream` ORDER BY `uploaded_time` DESC";
    //     $result = $db->query($sql);
    //     return iterator_to_array($result);
    // }

    public static function countAlldream()
    {
        $db = Database::getConnection();
        $sql = "SELECT COUNT(*) as count FROM `dream` ORDER BY `uploaded_time` DESC";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }

    public function __construct($id)
    {
        $this->id = $id;
        // $userid = $this->userid;
        $this->conn = Database::getConnection();
        $this->table = 'dream';

        $db = Database::getConnection();
        // Calculate the timestamp for the expiry time (e.g., -1 minute after upload)
        $expiryTime = date('Y-m-d H:i:s', strtotime('-1 minute'));

        // Query the database for images that have expired
        $sql = "SELECT id, dreamimage FROM `dream` WHERE `uploaded_time` <= '$expiryTime'";
        $result = $db->query($sql);

        // Delete expired images from the server and database
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->id = $row['id'];
                // die(var_dump($this->id));
                $DreamImage= $row['dreamimage'];

                // Delete the image file from the server
                if (file_exists($DreamImage)) {
                    unlink($DreamImage);
                } else {
                    // Delete the image record from the database
                    $deleteSql = "DELETE FROM `dream` WHERE `id` = $id";
                    // die($deleteSql);
                    if($db->query($deleteSql)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }
    }
}
