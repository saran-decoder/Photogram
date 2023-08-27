<?php

require_once "Database.class.php";
include_once __DIR__ . "/../traits/SQLGetterSetter.trait.php";

class Profile
{
    use SQLGetterSetter; //including a trait

    public $id;
    public $conn;
    public $table;

    public static function profile($bio, $avatar, $gender, $dob, $links)
    {
        if (is_file($avatar) and exif_imagetype($avatar) !== false) {
            $userid = md5(Session::getUser()->getID());
            $owner = Session::getUser()->getUsername();
            $image_name = md5($owner.time()) . image_type_to_extension(exif_imagetype($avatar));
            die($image_name);
            $image_path = get_config('upload_path') . $image_name;
            if (move_uploaded_file($avatar, $image_path)) {
                $avatar_path = "/ava/$image_name";
                $update_profile = "UPDATE `users` SET `userid`='$userid', `bio`='$bio', `avatar`='$avatar_path', `gender`='$gender', `dob`='$dob', `links`='$links', WHERE `owner`='$owner'";
                $db = Database::getConnection();
                try {
                    return $db->query($update_profile);
                } catch (Exception $e) {
                    return false;
                }
            }
        } else {
            throw new Exception("Profile is not uploaded");
        }
    }

    public static function getProfile()
    {
        $db = Database::getConnection();
        $owner = Session::getUser()->getUsername();
        $sql = "SELECT * FROM `users` WHERE `owner`='$owner'";
        $result = $db->query($sql);
        
        return $result->fetch_assoc();
    }

    public static function getProfileowner()
    {
        $db = Database::getConnection();
        $owner = Session::getUser()->getUsername();
        $sql = "SELECT * FROM `auth` WHERE `username`='$owner'";
        $result = $db->query($sql);
        
        return $result->fetch_assoc();
    }

    // public static function getPostcount()
    // {
    //     $db = Database::getConnection();
    //     $owner = Session::getUser()->getUsername();
    //     $sql = "SELECT COUNT(*) AS `image_uri` FROM `posts` WHERE `owner` = '$owner'";
    //     $result = $db->query($sql);
        
    //     return $result->fetch_assoc();
    // }

    public function __construct($id)
    {
        $this->id = $id;
        $this->conn = Database::getConnection();
        $this->table = 'users';
    }
}