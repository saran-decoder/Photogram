<?php

include_once __DIR__ . "/../traits/SQLGetterSetter.trait.php";

class Profile
{
    use SQLGetterSetter; //including a trait

    public $id;
    public $conn;
    public $table;

    public static function profile($avatar)
    {
        $id = Session::getUser()->getID();
        $owner = Session::getUser()->getUsername();
        $headid = md5(Session::getUser()->getUsername());
        if (is_file($avatar) && exif_imagetype($avatar) !== false) {
            $image_name = md5($owner . time()) . image_type_to_extension(exif_imagetype($avatar));
            $image_path = get_config('avatar_path') . $image_name;
            if (move_uploaded_file($avatar, $image_path)) {
                $avatar_path = "/ava/$image_name";
                $update_profile = "UPDATE `users` SET `avatar`='$avatar_path' WHERE `id`='$id'";
                $db = Database::getConnection();
                if ($db->query($update_profile)) {
                    $update_postavatar = "UPDATE `posts` SET `avatar`='$avatar_path' WHERE `id`='$id'";
                    if ($db->query($update_postavatar)) {
                        echo "<script>window.location.href = '/profile-edit?savedavatars={$headid}'</script>";
                        return true;
                    } else {
                        echo "<script>window.location.href = '/profile-edit?updatepostavatarerror'</script>";
                        return false;
                    }
                } else {
                    echo "<script>window.location.href = '/profile-edit?updateavatarerror'</script>";
                    return false;
                }
            } else {
                throw new Exception("Profile avatar could not be moved.");
            }
        } else {
            echo "<script>window.location.href = '/profile?{$owner}'</script>";
        }
    }

    public static function bio($bio)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $headid = md5(Session::getUser()->getUsername());
        $update_profile = "UPDATE `users` SET `bio`='$bio' WHERE `id`='$id'";
        try {
            if ($db->query($update_profile)) {
                echo "<script>window.location.href = '/profile-edit?savedbio={$headid}'</script>";
                return true;
            } else {
                echo "<script>window.location.href = '/profile-edit?updatebioerror'</script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script>window.location.href = '/profile?{$e->getMessage()}'</script>";
            return false;
        }
    }

    public static function username($username)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $headid = md5(Session::getUser()->getUsername());
        $user1_update = "UPDATE `auth` SET `username`='$username' WHERE `id`='$id'";
        try {
            if ($db->query($user1_update)) {
                $user2_update = "UPDATE `posts` SET `owner`='$username' WHERE `userid`='$id'";
                if ($db->query($user2_update)) {
                    $user3_update = "UPDATE `users` SET `owner`='$username' WHERE `userid`='$id'";
                    if ($db->query($user3_update)) {
                        echo "<script>window.location.href = '/profile-edit?savedalluser={$headid}'</script>";
                        return true;
                    } else {
                        echo "<script>window.location.href = '/profile-edit?error=3'</script>";
                        return false;
                    }
                } else {
                    echo "<script>window.location.href = '/profile-edit?error=2'</script>";
                    return false;
                }
            } else {
                echo "<script>window.location.href = '/profile-edit?error=1'</script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script>window.location.href = '/profile?error=yourquery'</script>";
            return false;
        }
    }

    public static function email($email)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $headid = md5(Session::getUser()->getUsername());
        $update_profile = "UPDATE `auth` SET `email`='$email' WHERE `id`='$id'";
        try {
            if ($db->query($update_profile)) {
                echo "<script>window.location.href = '/profile-edit?savedemail={$headid}'</script>";
                return true;
            } else {
                echo "<script>window.location.href = '/profile-edit?updateemailerror'</script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script>window.location.href = '/profile?{$e->getMessage()}'</script>";
            return false;
        }
    }

    public static function phone($phone)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $headid = md5(Session::getUser()->getUsername());
        $update_profile = "UPDATE `auth` SET `phone`='$phone' WHERE `id`='$id'";
        try {
            if ($db->query($update_profile)) {
                echo "<script>window.location.href = '/profile-edit?savedphonenumber={$headid}'</script>";
                return true;
            } else {
                echo "<script>window.location.href = '/profile-edit?updatephoneerror'</script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script>window.location.href = '/profile?{$e->getMessage()}'</script>";
            return false;
        }
    }

    public static function gender($gender)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $headid = md5(Session::getUser()->getUsername());
        $update_profile = "UPDATE `users` SET `gender`='$gender' WHERE `id`='$id'";
        try {
            if ($db->query($update_profile)) {
                echo "<script>window.location.href = '/profile-edit?savedgender={$headid}'</script>";
                return true;
            } else {
                echo "<script>window.location.href = '/profile-edit?updategendererror'</script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script>window.location.href = '/profile?{$e->getMessage()}'</script>";
            return false;
        }
    }

    public static function dob($dob)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $headid = md5(Session::getUser()->getUsername());
        $update_profile = "UPDATE `users` SET `dob`='$dob' WHERE `id`='$id'";
        try {
            if ($db->query($update_profile)) {
                echo "<script>window.location.href = '/profile-edit?saveddob={$headid}'</script>";
                return true;
            } else {
                echo "<script>window.location.href = '/profile-edit?updatedoberror'</script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script>window.location.href = '/profile?{$e->getMessage()}'</script>";
            return false;
        }
    }

    public static function newPassword($current_password, $password)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $headid = md5(Session::getUser()->getUsername());
        $query = "SELECT `password` FROM `auth` WHERE `id` = '$id'";
        $result = $db->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($current_password, $row['password'])) {
                $options = [
                    'cost' => 9,
                ];
                $password = password_hash($password, PASSWORD_BCRYPT, $options);
                $update_profile = "UPDATE `auth` SET `password`='$password' WHERE `id`='$id'";
                try {
                    if ($db->query($update_profile)) {
                        echo "<script>window.location.href = '/profile-edit?savenewpass={$headid}'</script>";
                        return true;
                    } else {
                        echo "<script>window.location.href = '/profile-edit?updatepasserror'</script>";
                        return false;
                    }
                } catch (Exception $e) {
                    echo "<script>window.location.href = '/profile?{$e->getMessage()}'</script>";
                    return false;
                }
            } else {
                echo "<script>window.location.href = '/profile-edit?verifypasserror'</script>";
                return false;
            }
        } else {
            return false;
        }
    }

    public static function link($link)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $headid = md5(Session::getUser()->getUsername());
        $update_profile = "UPDATE `users` SET `link`='$link' WHERE `id`='$id'";
        try {
            if ($db->query($update_profile)) {
                echo "<script>window.location.href = '/profile-edit?savedlink={$headid}'</script>";
                return true;
            } else {
                echo "<script>window.location.href = '/profile-edit?updatelinkerror'</script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script>window.location.href = '/profile?{$e->getMessage()}'</script>";
            return false;
        }
    }

    public static function getuserProfile()
    {
        $username = $_GET['username'];
        $db = Database::getConnection();
        $sql = "SELECT * FROM `users` WHERE `owner`='$username'";
        $result = $db->query($sql);
        return $result->fetch_assoc();
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

    public static function getPostcount()
    {
        $username = $_GET['username'];
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $sql = "SELECT COUNT(*) AS `image_uri` FROM `posts` WHERE `owner` = '$username'";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }

    public function __construct($id)
    {
        $this->id = $id;
        $this->conn = Database::getConnection();
        $this->table = 'users';
    }
}