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
      case 'login':
        $username = $args['username'];
        $password = $args['pwd'];
        $userData = getUser($username, $password);

        if (count($userData) > 0) {
          $response = json_encode($userData);
          $_SESSION['currUser'] = $response;
        }
        break;
      case 'register':
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        $response = json_encode(addNewUser($username, $email, $password));
        break;
      case 'status':
        if ($_SESSION && array_key_exists('currUser', $_SESSION))
          $response = $_SESSION['currUser'];
        break;
      case 'logout':
          session_destroy();
        break;
      default:
        break;
    }
    echo $response;
