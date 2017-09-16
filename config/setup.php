<?php
 /*
@Author: Dregend Drewonidas <root>
@Date:   Wednesday, October 19, 2016 4:40 AM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Saturday, November 12, 2016 5:08 AM
@License: maDezynIzM.E. 2016
*/

    require('../php/Services/Modal.class.php');

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
                    reg_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    location VARCHAR(500),
                    verified BOOLEAN DEFAULT FALSE,
                    last_in DATETIME,
                    rating INT(5) UNSIGNED DEFAULT 1,
                    image_id INT(6) UNSIGNED)";
            $conn->exec($sql);
            echo 'Table users created<br/>';

            // create IMGS table
            $sql = "CREATE TABLE IF NOT EXISTS images (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    img VARCHAR(128) NOT NULL,
                    date DATETIME DEFAULT CURRENT_TIMESTAMP,
                    user_id INT(6) UNSIGNED NOT NULL)";
            $conn->exec($sql);
            echo 'Table images created<br/>' . PHP_EOL;

            // create likes table
            $sql = "CREATE TABLE IF NOT EXISTS likes (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    Like_date DATETIME DEFAULT CURRENT_TIMESTAMP,
                    sender_id INT(6) UNSIGNED NOT NULL,
                    recipient_id INT(6) UNSIGNED NOT NULL)";
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
                    msg_date DATETIME DEFAULT CURRENT_TIMESTAMP,
                    chat_id INT(6) UNSIGNED NOT NULL,
                    sender_id INT(6) UNSIGNED NOT NULL,
                    recipient_id INT(6) UNSIGNED NOT NULL)";
            $conn->exec($sql);
            echo 'Table messages created<br/>' . PHP_EOL;

            // create Notifications table
            $sql = "CREATE TABLE IF NOT EXISTS notifications (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    notification_text VARCHAR(128) NOT NULL,
                    about_id INT(6) UNSIGNED NOT NULL,
                    notification_date DATETIME DEFAULT CURRENT_TIMESTAMP,
                    user_id INT(6) UNSIGNED NOT NULL)";
            $conn->exec($sql);
            echo 'Table notifications created<br/>' . PHP_EOL;
            echo 'Matcha database created successfully<br/>' . PHP_EOL;
            echo '<a href="/server/matcha/index.html">Run app</a>';
            $conn = null;
        }
        catch(PDOException $e) {
            echo 'sql error' . $e->getMessage();
        }
    }
?>
