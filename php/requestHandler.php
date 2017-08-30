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
            $userData = getUser($username, $password);

            if (count($userData) > 0) {
                $response = json_encode($userData);
                $_SESSION['currUser'] = $response;
            }
            break;
        case 'status':
            if ($_SESSION && array_key_exists('currUser', $_SESSION))
              $response = $_SESSION['currUser'];
            break;
        case 'logout':
            session_destroy();
//            $response = json_encode("bye");
        break;
        case 'profiles':
            $user = $args['user'];
            $userData = getAllUsers($user);
            $response = json_encode($userData);
            break;
        case 'profile_info':
//            if ($_SESSION && array_key_exists('currUser', $_SESSION)) {
                $userID = $args['id'];
                $response = json_encode(getMemberProfile($userID));
//            }
            break;
        case 'update':
            $user = json_decode($_SESSION['currUser'], true);
            $userID = $user['id'];
            $response = json_encode(changeDetails($userID));
            break;
        default:
            break;
    }
    echo $response;
