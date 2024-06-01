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

        // Check if the uploaded file is an image
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_buffer($finfo, $avatar);

        if (strpos($mime_type, 'image/') !== 0) {
            finfo_close($finfo);
            throw new Exception('Invalid file type. Only images are allowed.');
        }

        finfo_close($finfo);

        $extensions = ['jpg', 'jpeg', 'png']; // Add other valid image extensions
        $randomExtension = $extensions[array_rand($extensions)];

        $image_name = md5($owner . time()) . '.' . $randomExtension;
        
        $image_path = get_config('avatar_path') . $image_name;


        // Use file_put_contents to move the file
        if (file_put_contents($image_path, $avatar)) {
            $avatar_path = "/ava/$image_name";

            // Update user's avatar in the database
            $update_profile = "UPDATE `users` SET `avatar`='$avatar_path' WHERE `userid`='$id'";
            $db = Database::getConnection();

            if ($db->query($update_profile)) {
                // Update avatar in user's posts
                $update_postavatar = "UPDATE `posts` SET `avatar`='$avatar_path' WHERE `userid`='$id'";

                if ($db->query($update_postavatar)) {
                    echo "Profile updated successfully.";
                    return true;
                } else {
                    echo "Error updating post avatars" . $db->error;
                    return false;
                }
            } else {
                echo "Error updating user profile: " . $db->error;
                return false;
            }
        } else {
            throw new Exception('Error moving the file to the destination path');
            return false;
        }
    }

    public static function banner($banner)
    {
        $id = Session::getUser()->getID();
        $owner = Session::getUser()->getUsername();

        // Check if the uploaded file is an image
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_buffer($finfo, $banner);

        if (strpos($mime_type, 'image/') !== 0) {
            finfo_close($finfo);
            throw new Exception('Invalid file type. Only images are allowed.');
        }

        finfo_close($finfo);

        $extensions = ['jpg', 'jpeg', 'png']; // Add other valid image extensions
        $randomExtension = $extensions[array_rand($extensions)];

        $image_name = md5($owner . time()) . '.' . $randomExtension;
        $image_path = get_config('bgavatar_path') . $image_name;

        // Use file_put_contents to move the file
        if (file_put_contents($image_path, $banner)) {
            $bgavatar_path = "/bgava/$image_name";

            // Update user's avatar in the database
            $update_profile = "UPDATE `users` SET `bgavatar`='$bgavatar_path' WHERE `userid`='$id'";
            $db = Database::getConnection();

            if ($db->query($update_profile)) {
                echo "Profile banner updated successfully.";
                return true;
            } else {
                echo "Error updating user profile banner: " . $db->error;
                return false;
            }
        } else {
            throw new Exception('Error moving the file to the destination path');
            return false;
        }
    }

    public static function profileinfo($user, $email, $phone, $dob, $gender, $status, $location, $link, $bio)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $update_profile = "UPDATE `users` SET `dob`='$dob', `gender`='$gender', `status`='$status', `location`='$location', `link`='$link', `bio`='$bio', `owner`='$user' WHERE `userid`='$id'";
        try {
            if ($db->query($update_profile)) {
                $u_profile ="UPDATE `auth` SET `username`='$user', `email`='$email', `phone`='$phone' WHERE `id`='$id'";
                if ($db->query($u_profile)) {
                    echo  "<div class=\"alert alert-success\">Profile information has been saved.</div>";
                    return true;
                } else {
                    throw new Exception('This is auth info error:' . mysqli_error($db));
                    return false;
                }
            } else {
                throw new Exception('This is users info error' . mysqli_error($db));
                return false;
            }
        } catch (Exception $e) {
            echo "This is profile info error: {$e->getMessage()}";
            return false;
        }
    }


    public static function newPassword($current_password, $password, $confirm_password)
    {
        if ($password === $confirm_password) {
            $db = Database::getConnection();
            $id = Session::getUser()->getID();
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
                            echo "<script>alert('Password has been changed.');</script>";
                            return true;
                        } else {
                            throw new Exception('Password Update Error: ' . mysqli_error($db));
                            return false;
                        }
                    } catch (Exception $e) {
                        echo "<script>alert('Password Error: {$e->getMessage()}');</script>";
                        return false;
                    }
                } else {
                    echo "<script>alert('Verify Password Error.');window.location.href = '/settings';</script>";
                    throw new Exception('Verify Password Error.');
                    return false;
                }
            } else {
                return false;
            }
        } else {
            echo "<script>alert('Confirmation does not match the password.');</script>";
            throw new Exception('Confirmation does not match the password.');
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

    public static function getAuth()
    {
        $username = $_GET['username'];
        $db = Database::getConnection();
        $sql = "SELECT * FROM `auth` WHERE `username`='$username'";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }

    public static function getuserEAuth($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            list($user, $domain) = explode('@', $email);
            $user = preg_replace('/(?<=.{2})./', '*',$user);
            $domain = preg_replace('/(?<=.{1}).(?=>)/', '*', $domain);
            $result = "$user@$domain";
            return $result;
        } else {
            return false;
        }
    }
    public static function getuserPAuth($phone)
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        $hidden_part = substr($phone, 1, -2);
        $hidden_part = str_repeat('*', strlen($hidden_part));
        $formatted_phone = substr($phone, 0, 1) . $hidden_part . substr($phone, -2);
        return $formatted_phone;
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
        $sql = "SELECT COUNT(*) AS `image_uri` FROM `posts` WHERE `owner` = '$username'";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }

    // Start: This code user for search profiles code
    public static function getAllUser()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM `users`";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }
    // Ended

    // User account login activity
    public static function getDeviceInfo()
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $sql = "SELECT `login_time`, `ip`, `user_agent`, `active` FROM `session` WHERE `uid`='$id' ORDER BY `login_time` DESC";
        $result = $db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getInfo()
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $sql = "SELECT `token` FROM `session` WHERE `uid`='$id' ORDER BY `login_time` DESC";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }

    public static function extractDeviceInfo($userAgent) {

        // Match browser name
        if (preg_match('/(Chrome|Firefox|Safari|Edge|Opera)/i', $userAgent, $matches)) {
            $browser = $matches[1];
        } else {
            $browser = "Unknown Browser";
        }

        // Get device name
        // Define a regular expression pattern to match content within parentheses excluding "X11"
        $pattern = '/\(([^)]+)\)/';

        // Use preg_replace to remove "X11," "x86_64," and "KHTML, like Gecko" from the matched content
        $cleanedContent = preg_replace('/X11;|KHTML, like Gecko|x86_64/', '', $userAgent);

        if (preg_match($pattern, $cleanedContent, $matches)) {
            $device = $matches[1];
        } else {
            $device = "Unknown Device";
        }

        return ['browser' => $browser, 'device' => $device];
    }

    public function __construct($id)
    {
        $this->id = $id;
        $this->conn = Database::getConnection();
        $this->table = 'users';
    }
}