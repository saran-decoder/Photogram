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
            return $conn->query($sql);
        } catch (Exception $e) {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

    public static function def_profile($user)
    {
        $conn = Database::getConnection();
        $avatar = "/ava/avatar.jpg";
        $sql = "INSERT INTO `users` (`userid`, `bio`, `avatar`, `gender`, `dob`, `links`, `owner`)
        VALUES ('', '', '$avatar', '', now(), '', '$user');";
        try {
            return $conn->query($sql);
        } catch (Exception $e) {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

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

    public function setDob($year, $month, $day)
    {
        if (checkdate($month, $day, $year)) { //checking data is valid
            return $this->_set_data('dob', "$year.$month.$day");
        } else {
            return false;
        }
    }



    // public function getUsername()
    // {
    //     return $this->username;
    // }

    public function authenticate()
    {
    }

    // public function setBio($bio)
    // {
    //     //TODO: Write UPDATE command to change new bio
    //     return $this->_set_data('bio', $bio);
    // }

    // public function getBio()
    // {
    //     //TODO: Write SELECT command to get the bio.
    //     return $this->_get_data('bio');
    // }

    // public function setAvatar($link)
    // {
    //     return $this->_set_data('avatar', $link);
    // }

    // public function getAvatar()
    // {
    //     return $this->_get_data('avatar');
    // }

    // public function setFirstname($name)
    // {
    //     return $this->_set_data("firstname", $name);
    // }

    // public function getFirstname()
    // {
    //     return $this->_get_data('firstname');
    // }

    // public function setLastname($name)
    // {
    //     return $this->_set_data("lastname", $name);
    // }

    // public function getLastname()
    // {
    //     return $this->_get_data('lastname');
    // }



    // public function getDob()
    // {
    //     return $this->_get_data('dob');
    // }

    // public function setInstagramlink($link)
    // {
    //     return $this->_set_data('instagram', $link);
    // }

    // public function getInstagramlink()
    // {
    //     return $this->_get_data('instagram');
    // }

    // public function setTwitterlink($link)
    // {
    //     return $this->_set_data('twitter', $link);
    // }

    // public function getTwitterlink()
    // {
    //     return $this->_get_data('twitter');
    // }
    // public function setFacebooklink($link)
    // {
    //     return $this->_set_data('facebook', $link);
    // }

    // public function getFacebooklink()
    // {
    //     return $this->_get_data('facebook');
    // }
}
