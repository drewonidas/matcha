<?php
 /*
@Author: Dregend Drewonidas <root>
@Date:   Wednesday, October 19, 2016 4:40 AM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Saturday, November 12, 2016 5:08 AM
@License: maDezynIzM.E. 2016
*/

    require('Modal.class.php');

    function setupDBTables() {
        $modal = new Modal();
        $conn = $modal->get_connection();

        try {
            //create users_profiles table
            $sql = "CREATE TABLE IF NOT EXISTS users_profiles (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(30) NOT NULL,
                    email VARCHAR(30) NOT NULL,
                    password VARCHAR(8) NOT NULL,
                    first_name VARCHAR(30) NOT NULL,
                    last_name VARCHAR(30) NOT NULL,
                    gender ENUM(male, female),
                    sexual_pref ENUM('males', 'females', 'both'),
                    bio TEXT,
                    interests TEXT,
                    reg_date DATETIME() NOT NULL,
                    location VARCHAR(500) NOT NULL,
                    verified BOOLEAN DEFAULT FALSE,
                    last_on DATETIME(),
                    rating INT(5),
                    profile_pic_id INT(6) UNSIGNED)";

            $conn->exec($sql);
            echo 'Table user_profiles created successfully<br/>';
            // create IMGS table
            $sql = "CREATE TABLE IF NOT EXISTS images (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    img_path VARCHAR(128) NOT NULL,
                    img_date DATETIME(),
                    user_id INT(6) UNSIGNED NOT NULL)";

            $conn->exec($sql);
            echo 'Table images created successfully<br/>' . PHP_EOL;
            // create likes table
            $sql = "CREATE TABLE IF NOT EXISTS likes (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    type ENUM('like', 'comment'),
                    comm_text VARCHAR(4) NOT NULL,
                    comm_date DATETIME(),
                    user_id INT(6) UNSIGNED NOT NULL,
                    img_id INT(6) UNSIGNED NOT NULL)";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo 'Table comments created successfully<br/>' . PHP_EOL;
        }
        catch(PDOException $e) {
            echo 'sql error' . $e->getMessage();
        }
        $conn = null;
    }
?>
