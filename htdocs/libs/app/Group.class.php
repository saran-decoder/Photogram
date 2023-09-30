<?php

include_once __DIR__ . "/../traits/SQLGetterSetter.trait.php";

class Group
{
    use SQLGetterSetter; //including a trait

    public $id;
    public $conn;
    public $table;

    public static function GroupAvatar($avatar)
    {
        $owner = Session::getUser()->getUsername();
        $headid = md5(Session::getUser()->getUsername());
        if (is_file($avatar) && exif_imagetype($avatar) !== false) {
            $image_name = md5($owner . time()) . image_type_to_extension(exif_imagetype($avatar));
            $image_path = get_config('group_avatar') . $image_name;
            if (move_uploaded_file($avatar, $image_path)) {
                $g_avatar = "/groupavatar/$image_name";
                $update_info = "UPDATE `group` SET `g_avatar` = '$g_avatar', `uploaded_time` = now(), `owner` = '$owner' WHERE `owner`='$owner'";
                $db = Database::getConnection();
                try {
                    echo "<script>window.location.href = '/discussion?savedavatar={$headid}'</script>";
                    return $db->query($update_info);
                } catch (Exception $e) {
                    echo "Message : {$e->getMessage()}";
                    return false;
                }
            } else {
                throw new Exception("Profile avatar could not be moved.");
            }
        } else {
            echo "<script>window.location.href = '/discussion'</script>";
        }
    }

    public static function GroupTitle($title)
    {
        $db = Database::getConnection();
        $owner = Session::getUser()->getUsername();
        $headid = md5(Session::getUser()->getUsername());
        $update_profile = "UPDATE `group` SET `g_title` = '$title', `uploaded_time` = now(), `owner` = '$owner' WHERE `owner`='$owner'";
        try {
            echo "<script>window.location.href = '/discussion?savedtitle={$headid}'</script>";
            return $db->query($update_profile);
        } catch (Exception $e) {
            echo "Message : {$e->getMessage()}";
            return false;
        }
    }

    // public static function sendMessage($message) {
    //     $db = Database::getConnection();
    //     $userid = Session::getUser()->getID();
    //     $owner = Session::getUser()->getUsername();
    //     $insert_group = "INSERT INTO `message` (`from_user`, `to_user`, `message`, `status`, `update_time`, `owner`) VALUES ('$userid', 1, '$message', 0, now(), '$owner')";
    //     if ($db->query($insert_group)) {
    //         $id = mysqli_insert_id($db);
    //         return new Group($id);
    //     } else {
    //         echo "<script>window.location.href = '/discussion?error'</script>";
    //         return false;
    //     }
    // }

    // public static function getMessage() {
    //     $db = Database::getConnection();
    // }

    public static function getAllGroupinfo() {
        $owner = Session::getUser()->getUsername();
        $db = Database::getConnection();
        $sql = "SELECT * FROM `group` WHERE `owner` = '$owner'";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }
    
    public static function getGroup()
    {
        $groupID = $_GET['discuss_name'];
        $db = Database::getConnection();
        $sql = "SELECT * FROM `group` WHERE `id` = '$groupID'";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }

    public function __construct($id)
    {
        $this->id = $id;
        $this->conn = Database::getConnection();
        $this->table = 'group';
    }
}