<?php
/*
@Author: Dregend Drewonidas <root>
@Date:   Wednesday, November 9, 2016 9:24 PM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Saturday, November 12, 2016 1:07 AM
@License: maDezynIzM.E. 2016
*/
    session_start();
    require('Modal.class.php');

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (array_key_exists('uname', $_SESSION))
            echo json_encode('TRUE');
        else {
            echo json_encode('FALSE');
        }
    }else {
        echo "!!!! server request error !!!";
    }
?>
