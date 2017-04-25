<?php
/*
@Author: Dregend Drewonidas <root>
@Date:   Wednesday, October 19, 2016 2:24 AM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
<<<<<<< HEAD
@Last modified time: Tuesday, November 1, 2016 4:27 AM
=======
@Last modified time: Friday, October 28, 2016 3:59 AM
>>>>>>> c36f4f51df6c891d06a64f19fcd2a242d6aca80b
@License: maDezynIzM.E. 2016
*/

    require('Modal.class.php');
    $uname = $fname = $lname = $passwrd = $email = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $uname = test_input($_POST['uname']);
        $fname = test_input($_POST['fname']);
        $lname = test_input($_POST['lname']);
        $passwrd = test_input($_POST['pwd']);
        $email = test_input($_POST['email']);
        $data = array($uname, $fname, $lname, $email, $passwrd);
        $modal = new Modal();
        $sql = $modal->generate_sql('new_user');
        // user data validation
        $modal->change_db_data($sql, $data);
        echo 'TRUE';
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
