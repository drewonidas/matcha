<?php
 /*
@Author: Dregend Drewonidas <root>
@Date:   Wednesday, October 19, 2016 4:40 AM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Saturday, November 12, 2016 5:08 AM
@License: maDezynIzM.E. 2016
*/

    require('../php/classes/Modal.class.php');

    function setupDBTables() {
        $conn = Modal::createDBConnection();

        try {
            //create users_profiles table
            $sql = "CREATE TABLE IF NOT EXISTS users (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(30) NOT NULL,
                    email VARCHAR(30) NOT NULL,
                    password VARCHAR(8) NOT NULL,
                    first_name VARCHAR(30) NOT NULL,
                    last_name VARCHAR(30) NOT NULL,
                    gender ENUM('male', 'female'),
                    sexual_pref ENUM('males', 'females', 'both'),
                    bio TEXT,
                    interests TEXT,
                    reg_date DATETIME NOT NULL,
                    location VARCHAR(500) NOT NULL,
                    verified BOOLEAN DEFAULT FALSE,
                    last_in DATETIME,
                    rating INT(5) UNSIGNED,
                    image_id INT(6) UNSIGNED)";
            $conn->exec($sql);
            echo 'Table users created<br/>';

            // create IMGS table
            $sql = "CREATE TABLE IF NOT EXISTS images (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    img_data VARCHAR(128) NOT NULL,
                    img_date DATETIME,
                    user_id INT(6) UNSIGNED NOT NULL)";
            $conn->exec($sql);
            echo 'Table images created<br/>' . PHP_EOL;

            // create likes table
            $sql = "CREATE TABLE IF NOT EXISTS likes (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    like_type ENUM('like', 'comment'),
                    Like_text VARCHAR(4) NOT NULL,
                    Like_date DATETIME,
                    sender_id INT(6) UNSIGNED NOT NULL,
                    recipient_id INT(6) UNSIGNED NOT NULL)";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo 'Table comments created<br/>' . PHP_EOL;

            // create chats table
            $sql = "CREATE TABLE IF NOT EXISTS chats (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    user1_id INT(6) UNSIGNED NOT NULL,
                    user2_id INT(6) UNSIGNED NOT NULL)";
            $conn->exec($sql);
            echo 'Table chats created<br/>' . PHP_EOL;

            // create Messages table
            $sql = "CREATE TABLE IF NOT EXISTS messages (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    msg_text VARCHAR(128) NOT NULL,
                    chat_id INT(6) UNSIGNED NOT NULL,
                    msg_date DATETIME,
                    sender_id INT(6) UNSIGNED NOT NULL,
                    recipient_id INT(6) UNSIGNED NOT NULL)";
            $conn->exec($sql);
            echo 'Table messages created<br/>' . PHP_EOL;

            // create Notifications table
            $sql = "CREATE TABLE IF NOT EXISTS notifications (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    notification_text VARCHAR(128) NOT NULL,
                    about_id INT(6) UNSIGNED NOT NULL,
                    notification_date DATETIME,
                    user_id INT(6) UNSIGNED NOT NULL)";
            $conn->exec($sql);
            echo 'Table notifications created<br/>' . PHP_EOL;
            echo 'Matcha database created successfully<br/>' . PHP_EOL;
            echo '<a href="/web/matcha/index.html">Run app</a>';
            $conn = null;
        }
        catch(PDOException $e) {
            echo 'sql error' . $e->getMessage();
        }
    }
?>
