<?php

require_once "Database.class.php";
include_once __DIR__ . "/../traits/SQLGetterSetter.trait.php";

class User
{
    use SQLGetterSetter;
    private $conn;

    public $id;
    public $username;
    public $table;

    public static function signup($user, $pass, $email, $phone)
    {
        $options = [
            'cost' => 9,
        ];
        $pass = password_hash($pass, PASSWORD_BCRYPT, $options);
        $conn = Database::getConnection();
        $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`)
        VALUES ('$user', '$pass', '$email', '$phone');";
        //PHP 8.1 - all MySQLi errors are throws as Exceptions
        try {
            if ($conn->query($sql)) {
                $avatar = "/ava/avatar.jpg";
                $bio = "Hey there! I am using Photogram";
                $userid = mysqli_insert_id($conn);
                $sql = "INSERT INTO `users` (`userid`, `bio`, `avatar`, `gender`, `dob`, `linkname`, `link`, `uploaded_time`, `owner`)
                VALUES ('$userid', '$bio', '$avatar', '', now(), '', '', now(), '$user');";
                try {
                    if ($conn->query($sql)) {
                        echo "<script>window.location.href = '/signup?{$user}={$userid}'</script>";
                        return true;
                    } else {
                        return false;
                    }
                } catch (Exception $e) {
                    echo "Error: " . $sql . "<br>" . $e->getMessage() . $conn->error;
                    return false;
                }
            }
        } catch (Exception $e) {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

    // public static function def_profile($user)
    // {
    //     $conn = Database::getConnection();
    //     $avatar = "/ava/avatar.jpg";
    //     $bio = "Hey there! I am using Photogram";
    //     $userid = Session::getUser()->getID();
    //     $sql = "INSERT INTO `users` (`userid`, `bio`, `avatar`, `gender`, `dob`, `link`, `uploaded_time`, `owner`)
    //     VALUES ('$userid', '$bio', '$avatar', '', '', '', now(), '$user');";
    //     try {
    //         return $conn->query($sql);
    //     } catch (Exception $e) {
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //         return false;
    //     }
    // }

    public static function login($user, $pass)
    {
        $query = "SELECT * FROM `auth` WHERE `username` = '$user' OR `email` = '$user' OR `phone` = '$user'";
        $conn = Database::getConnection();
        $result = $conn->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            //if ($row['password'] == $pass) {
            if (password_verify($pass, $row['password'])) {
                /*
                1. Generate Session Token
                2. Insert Session Token
                3. Build session and give session to user.
                */
                return $row['username'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //User object can be constructed with both UserID and Username.
    public function __construct($username)
    {
        //TODO: Write the code to fetch user data from Database for the given username. If username is not present, throw Exception.
        $this->conn = Database::getConnection();
        //TODO: Change this if username param is an email
        $this->username = $username;
        $this->id = null;
        $this->table = 'auth';
        $sql = "SELECT `id` FROM `auth` WHERE `username`= '$username' OR `id` = '$username' OR `email` = '$username' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->id = $row['id']; //Updating this from database
        } else {
            throw new Exception("Username does't exist");
        }
    }

    public static function getUserAccount() {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM `users` ORDER BY `uploaded_time` DESC";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }

    public static function getAccountCount() {
        $db = Database::getConnection();
        $sql = "SELECT COUNT(*) AS `owner` FROM `users` ORDER BY `uploaded_time` DESC";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }
}
