<?php
    /**
     * Created by PhpStorm.
     * User: Andrew
     * Date: 2017/03/25
     * Time: 10:07 AM
     */

    require('Services/UserService.php');
    session_start();

    switch ($_POST['reqType']) {
      case 'login':
        $username = $_POST['username'];
        $password = $_POST['pwd'];
        $userData = getUser($username, $password);
        if ($userData[0]['username'])
          $_SESSION['id'] = $userData[0]['id'];
        echo json_encode($userData);
        break;
      case 'register':
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        $response = addNewUser($username, $email, $password);
        echo json_encode($response);
        break;
      case 'status':
        if ($_SESSION && array_key_exists('id', $_SESSION))
          echo json_encode('1');
        else
          echo json_encode('0');
        break;
      case 'logout':
          session_destroy();
          echo json_encode('1');
        break;
      default:
        break;
    }
