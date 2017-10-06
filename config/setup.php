<?php
 /*
@Author: Dregend Drewonidas <root>
@Date:   Wednesday, October 19, 2016 4:40 AM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Saturday, November 12, 2016 5:08 AM
@License: maDezynIzM.E. 2016
*/

    require('../php/Services/ModalService.php');

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
                    gender VARCHAR(6) NOT NULL DEFAULT 'girl',
                    sexual_pref VARCHAR(13) NOT NULL DEFAULT 'guys & girls',
                    bio TEXT,
                    interests LONGTEXT,
                    reg_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    location VARCHAR(500),
                    verified BOOLEAN DEFAULT FALSE,
                    last_in DATETIME,
                    status ENUM('online', 'offline') NOT NULL DEFAULT 'offline',
                    rating INT(5) UNSIGNED DEFAULT 1,
                    image_id INT(6) UNSIGNED)";
            $conn->exec($sql);
            echo 'Table users created<br/>';

            // create IMGS table
            $sql = "CREATE TABLE IF NOT EXISTS images (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    img_data VARCHAR(128) NOT NULL,
                    creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,
                    owner_id INT(6) UNSIGNED NOT NULL,
                    FOREIGN KEY fk_owner(owner_id)
                    REFERENCES users(id)
                    ON UPDATE CASCADE
                    ON DELETE CASCADE)";
            $conn->exec($sql);
            echo 'Table images created<br/>' . PHP_EOL;

            // create Connections table
            $sql = "CREATE TABLE IF NOT EXISTS connections (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,
                    user1_id INT(6) UNSIGNED NOT NULL,
                    user2_id INT(6) UNSIGNED NOT NULL,
                    status BOOLEAN DEFAULT false,
                    FOREIGN KEY fk_users(user1_id)
                    REFERENCES users(id)
                    ON UPDATE CASCADE
                    ON DELETE CASCADE)";
            $conn->exec($sql);
            echo 'Table connections created<br/>' . PHP_EOL;

            // create Messages table
            $sql = "CREATE TABLE IF NOT EXISTS messages (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    text VARCHAR(128) NOT NULL,
                    send_date DATETIME DEFAULT CURRENT_TIMESTAMP,
                    author_id INT(6) UNSIGNED NOT NULL,
                    chat_id INT(6) UNSIGNED NOT NULL,
                    FOREIGN KEY fk_chat(chat_id)
                    REFERENCES connections(id)
                    ON UPDATE CASCADE
                    ON DELETE CASCADE)";
            $conn->exec($sql);
            echo 'Table messages created<br/>' . PHP_EOL;

            // create Notifications table
            $sql = "CREATE TABLE IF NOT EXISTS notifications (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    notification_type VARCHAR (16) DEFAULT NULL,
                    creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,
                    owner_id INT(6) UNSIGNED NOT NULL,
                    FOREIGN KEY fk_notification_owner(owner_id)
                    REFERENCES users(id)
                    ON UPDATE NO ACTION 
                    ON DELETE NO ACTION)";
            $conn->exec($sql);
            echo 'Table notifications created<br/>' . PHP_EOL;

            // create Notifications table
            $sql = "CREATE TABLE IF NOT EXISTS tags (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    interest_tag VARCHAR(128) NOT NULL)";
            $conn->exec($sql);
            echo 'Table notifications created<br/>' . PHP_EOL;

            /** CREATE VIEWS FOR 'SELECT'-TYPE QUERIES **/

            /*// create HOME VIEW
            $sql = "CREATE VIEW mini_profiles AS
                    SELECT u.id, u.username, u.status, u.rating
                    FROM users AS u";
            $conn->exec($sql);
            echo 'VIEW mini_profiles created<br/>' . PHP_EOL;*/

            // create profile_details VIEW
            $sql = "CREATE VIEW profiles AS
                    SELECT id, username, email, first_name, last_name,
                    gender, sexual_pref, bio, interests, location,
                    last_in, rating, image_id, status
                    FROM users";
            $conn->exec($sql);
            echo 'VIEW profiles created<br/>' . PHP_EOL;

            $sql = "CREATE PROCEDURE IF NOT EXISTS GetContactList(
                      IN currUser INT(6),
                      OUT matches INT(6))
                    BEGIN
                      SELECT id, username, last_in, rating, image_id, status
                      FROM users
                      WHERE rating > 3;
                    END";
            $conn->exec($sql);
            echo 'Procedure profiles created<br/>' . PHP_EOL;
/*            // create profile_details VIEW
            $sql = "CREATE VIEW user_likes AS
                    SELECT id, username, first_name, last_name,
                    gender, sexual_pref, bio, interests, location,
                    last_in, rating, status, 
                    FROM users";
            $conn->exec($sql);
            echo 'VIEW profile_details created<br/>' . PHP_EOL;*/

            // CREATE DUMMY DATA
            $sql = "INSERT INTO users (username, email, password,
                    first_name, last_name, gender, bio, rating)
                    VALUES ('drew', 'dlaminiandrew@gmail.com', 'qwerty',
                    'Andrew', 'Dlamini', 'guy',
                    'I like a lot of things, and love more', 5)";
            $conn->exec($sql);

            $sql = "INSERT INTO users (username, email, password, status,
                    first_name, last_name, gender, bio, rating)
                    VALUES ('jess', 'jessjameson@gmail.com', 'qwerty',
                    'online', 'Jessica', 'Jameson', 'girl',
                    'A good girl, except when im not ;)', 5)";
            $conn->exec($sql);

            $sql = "INSERT INTO users (username, email, password,
                    first_name, last_name, gender, sexual_pref, bio, rating)
                    VALUES ('Bet-E', 'bettygraigs@gmail.com', 'qwerty',
                    'Betty', 'Graigs', 'girl', 'guys',
                    'I like my men exactly like that, men', 3)";
            $conn->exec($sql);

            $sql = "INSERT INTO users (username, email, password, status,
                    first_name, last_name, gender, sexual_pref, bio, rating)
                    VALUES ('Dodo', 'dorrysouth@gmail.com', 'qwerty',
                    'online', 'Doreen', 'South', 'girl', 'girls',
                    'Just please dont bore me', 3)";
            $conn->exec($sql);

            $sql = "INSERT INTO users (username, email, password,
                    first_name, last_name, gender, bio, rating)
                    VALUES ('Frank', 'frankjackson@gmail.com', 'qwerty',
                    'Franklin', 'Jackson', 'guy', 'Lets see what you got', 4)";
            $conn->exec($sql);

            $sql = "INSERT INTO users (username, email, password, status,
                    first_name, last_name, gender, sexual_pref, bio, rating)
                    VALUES ('Two-shoes', 'danielburbs@gmail.com', 'qwerty',
                    'online', 'Daniel', 'Burbs', 'guy', 'girls',
                    'Dress good, eat good, live good', 3)";
            $conn->exec($sql);

            $sql = "INSERT INTO users (username, email, password,
                    first_name, last_name, sexual_pref, bio, rating)
                    VALUES ('Blos', 'blossomflowers@gmail.com', 'qwerty',
                    'blossom', 'Flowers', 'guy', 'Lets see what you got', 2)";
            $conn->exec($sql);

            $sql = "INSERT INTO users (username, email, password, status,
                    first_name, last_name, gender, sexual_pref, bio, rating)
                    VALUES ('Brent', 'brentjones@gmail.com', 'qwerty',
                    'online', 'Brent', 'Jones', 'guy', 'girls',
                    'Dress good, eat good, live good', 2)";
            $conn->exec($sql);

            $sql = "INSERT INTO users (username, email, password,
                    first_name, last_name, gender, bio, rating)
                    VALUES ('Carlos', 'carlosmaggi@gmail.com', 'qwerty',
                    'blossom', 'Flowers', 'guy', 'Lets see what you got', 1)";
            $conn->exec($sql);

            $sql = "INSERT INTO users (username, email, password, status,
                    first_name, last_name, gender, sexual_pref, bio, rating)
                    VALUES ('Diane', 'dianepikkel@gmail.com', 'qwerty',
                    'online', 'Diane', 'Pikkel', 'girl', 'guys',
                    'Dress good, eat good, live good', 1)";
            $conn->exec($sql);
            echo 'Dummy data created<br/>' . PHP_EOL;

            echo 'App database created successfully<br/>' . PHP_EOL;
            echo '<a href="/wtc/matcha/">Run app</a>';
            $conn = null;
        }
        catch(PDOException $e) {
            echo 'sql error' . $e->getMessage();
        }
    }
?>
