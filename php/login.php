<?php
/*
@Author: Dregend Drewonidas <root>
@Date:   Wednesday, October 19, 2016 2:12 AM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Saturday, November 12, 2016 1:00 AM
@License: maDezynIzM.E. 2016
*/

    // Start the session2

    require 'ChromePhp.php';
    require 'Modal.class.php';
    session_start();
//opcache_get_status();
    $uname = $passwrd = '';
    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_POST['uname'] = 'drew';
    $_POST['upwd'] = 'qw';
    //print_r($_POST['uname']);
    //exit();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $uname = test_input($_POST['uname']);
        $passwrd = test_input($_POST['upwd']);
        $modal = new Modal();
        $sql = $modal->generate_sql('get_user');
        //$data_set = array($uname);
        //var_dump($uname);
        $tmp = array($uname);
        $data = $modal->change_db_data('get', $sql, $tmp);
                        //ChromePhp::log($data);
        // user data validation
        if (count($data) > 0) {
            $_SESSION['uname'] = $uname;
            $_SESSION['id'] = $data[0]['id'];
            echo json_encode($data);
        } else {
            echo json_encode('FALSE');
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
