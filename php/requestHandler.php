<?php
    /**
     * Created by PhpStorm.
     * User: Andrew
     * Date: 2017/03/25
     * Time: 10:07 AM
     */

    require('Services/UserService.php');
    session_start();

    $args = json_decode($_POST['args'], true);
    $response = json_encode("notFound");
    switch ($_POST['reqType']) {
        case 'register':
            $username = $args['username'];
            $email = $args['email'];
            $password = $args['password'];
            $fname = $args['fname'];
            $lname = $args['lname'];
            $response = addNewUser($username, $email, $password, $fname, $lname);
            if ($response != true)
                break;
        case 'login':
            $username = $args['username'];
            $password = $args['password'];
            $userData = verifyCredentials($username, $password);

            if (count($userData) > 0) {
                $response = json_encode($userData[0]);
                $_SESSION['currUser'] = $response;
            }
            break;
        case 'status':
            if ($_SESSION && array_key_exists('currUser', $_SESSION))
                $response = $_SESSION['currUser'];
            break;
        case 'logout':
            session_destroy();
            break;
        case 'mini_profiles':
            $user = $args['user'];
            $userData = getAllUsers($user);
            $response = json_encode($userData);
            break;
        case 'mini_profile_info':
            $userID = $args['id'];
            $response = json_encode(getMemberProfile($userID));
            break;
        case 'user_profile':
            $user = json_decode($_SESSION['currUser']);
            $userID = $user->id;
            $response = json_encode(getUserProfile($userID));
            break;
        case 'update':
            $user = json_decode($_SESSION['currUser']);
            $userID = $user->id;
            $email = $args['email'];
            $fname = $args['fname'];
            $lname = $args['lname'];
            $gender = $args['gender'];
            $pref = $args['sex_pref'];
            $bio = $args['bio'];
            $args = array($email, $fname, $lname, $gender, $pref, $bio, $userID);
            $response = json_encode(changeDetails($args));
            break;
        case 'like_user':
            $user = json_decode($_SESSION['currUser']);
            $senderID = $user->id;
            $recipientID = $args['recID'];
            $params = array($senderID, $recipientID);
            $response = json_encode(likeUserProfile($params));
            break;
        default:
            break;
    }
    echo $response;
