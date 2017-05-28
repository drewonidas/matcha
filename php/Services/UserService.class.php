<?php
    /**
     * Created by PhpStorm.
     * User: Andrew
     * Date: 2017/03/25
     * Time: 10:07 AM
     */

    require(',,/classes/Modal.class.php');

        // log user in
    function signIn($username, $password) {
        $modal = new Modal();
        $sql = Modal::generate_sql('get_user');
        $tmp = array($username);
        $data = $modal->get_db_data($sql, $tmp);
        if (count($data) > 0 && $password == $data[0]['password']) {
            return $data;
        } else {
            return 'FALSE';
        }
    }

    // add a new user
    function signUp($username, $password, $email) {
        $data = array($username, $password, $email);
        $modal = new Modal();
        $sql = Modal::generate_sql('new_user');
        return ($modal->change_db_data($sql, $data));
    }

    // mail(to,subject,message,headers,parameters);
    // function: send verification mail
    function mailVerification($username, $emailAddress) {
        $msg = "Welcome to CamaGru\nPlease click on link below to verify your account";
        $msg = wordwrap($msg,70);
        // send email
        mail($emailAddress,"User account verification",$msg);
    }

    function signOut() {
        session_destroy();
        return 'bye';
    }