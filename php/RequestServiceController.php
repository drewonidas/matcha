<?php
    /**
     * Created by PhpStorm.
     * User: Andrew
     * Date: 2017/03/25
     * Time: 10:07 AM
     */

    require('Services/UserService.php');
    session_start();

    //print_r($_POST);
    $args = json_decode($_POST['args'], true);
    switch ($_POST['reqType']) {
      case 'login':
        $username = $args['username'];
        $password = $args['pwd'];
        $userData = getUser($username, $password);
        $profiles = "error";

        if (count($userData) > 0) {
          $_SESSION['currUser'] = json_encode($userData);
          $profiles = getAllUsers($username);
          $profiles[count($profiles)] = $userData[0];
        }
        //echo json_encode($userData);
        echo json_encode($profiles);
        break;
      case 'register':
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        $response = addNewUser($username, $email, $password);
        echo json_encode($response);
        break;
      case 'status':
        if ($_SESSION && array_key_exists('currUser', $_SESSION))
          echo $_SESSION['currUser'];
        else
          echo json_encode('error');
        break;
      case 'logout':
          session_destroy();
          echo json_encode('1');
        break;
      default:
        break;
    }
