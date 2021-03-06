<?php
/*
@Author: Dregend Drewonidas <root>
@Date:   Friday, October 21, 2016 2:15 PM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Thursday, November 10, 2016 2:35 AM
@License: maDezynIzM.E. 2016
*/

require('/app/config/database.php');

class Modal {
    private $_connection;

    public function __construct() {
        $this->_connection = Modal::createDBConnection();
    }

    public static function createDBConnection() {
        $dsn = $GLOBALS['DB_DSN'];
        $user = $GLOBALS['DB_USER'];
        $pwd = $GLOBALS['DB_PASSWORD'];
        $new_conn = null;
        try {
            $new_conn = new PDO($dsn, $user, $pwd);
            // set the PDO error mode to exception
            $new_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'something went wrong:' . $e->getMessage() . '<br/>';
        }
        return ($new_conn);
    }

    public static function generate_sql($data_set) {
        $sql = '';
        switch ($data_set) {
            case 'verify_user_cred':
                $sql = 'UPDATE users
                        SET last_in=CURRENT_TIMESTAMP, status="online"
                        WHERE username = ?';
                break;
            case 'sign_user_out':
                $sql = 'UPDATE users
                        SET last_in=CURRENT_TIMESTAMP, status="offline"
                        WHERE id = ?';
                break;
            case 'get_user_info':
                $sql = 'SELECT id, username
                        FROM users
                        WHERE username = ?
                        AND password = ?';
                break;
            case 'get_profile_info':
                $sql = 'SELECT username, first_name, last_name,
                        gender, sexual_pref, bio, interests, location,
                        last_in, rating, image_id
                        FROM profiles
                        WHERE id = ?';
                break;
            case 'get_all_users':
                $sql = 'SELECT members.id, members.username, members.status, members.rating
                        FROM profiles AS members, profiles AS user
                        WHERE user.id = ?
                        AND members.id <> user.id
                        AND members.rating <= user.rating
                        AND LOCATE(members.gender, user.sexual_pref) <> 0';
                break;
            case 'get_user_profile':
                $sql = 'SELECT *
                        FROM profiles
                        WHERE id = ?';
                break;
            case 'search_users':
                $sql = 'SELECT * FROM profiles
                        WHERE username = like %?%';
                break;
            case 'get_comm':
                $sql = 'SELECT * FROM comments
                        WHERE img_id = ?
                        ORDER BY comm_date
                        GROUP BY user_id';
                break;
            case 'get_all_imgs':
                $sql = 'SELECT * FROM imgs
                        ORDER BY img_date';
                break;
            case 'get_user_imgs':
                break;
                $sql = 'SELECT * FROM imgs
                        WHERE user_id = ?
                        ORDER BY img_date';
                break;
            case 'new_img':
                $sql = 'INSERT INTO imgs (location, user_id)
                        VALUES (?, ?, ?)';
                break;
            case 'new_user':
                $sql = 'INSERT INTO users (username, email, password, first_name, last_name)
                        VALUES (?, ?, ?, ?, ?)';
                break;
            case 'del_user':
                $sql = 'DELETE FROM users
                        WHERE id = ?';
                break;
            case 'new_like':
                $sql = 'INSERT INTO likes (sender_id, recipient_id)
                        VALUES (?, ?)';
                break;
            case 'del_like':
                $sql = 'DELETE FROM likes
                        WHERE sender_id = ?
                        AND recipient_id = ?';
                break;
            case 'del_img':
                $sql = 'DELETE FROM imgs
                        WHERE id = ?';
                break;
            case 'del_comm':
                $sql = 'DELETE FROM comments
                        WHERE id = ?';
                break;
            case 'edit_profile':
                $sql = 'UPDATE users
                        SET email=?, first_name=?, last_name=?,
                        gender=?, sexual_pref=?, bio=?
                        WHERE id = ?';
                break;
            case 'edit_password':
                $sql = 'UPDATE users SET password = ?
                        WHERE id = ?';
                break;
            case 'verify_user':
                $sql = 'UPDATE users SET verified = true';
                break;
            default:
                break;
        }
        return ($sql);
    }

    public function get_connection() {
        return ($this->_connection);
    }

    // returns data from the sql query call
    public function get_db_data($sql, $data) {
        $resultData = null;
        try {
            $tmp = $this->_connection->prepare($sql);
            if (!is_null($data)) {
                for ($c = 0; $c < count($data); $c++) {
                    $tmp->bindParam((string)($c + 1), $data[$c]);
                }
            }
            $tmp->execute();
            $tmp->setFetchMode(PDO::FETCH_ASSOC);
            $resultData = $tmp->fetchAll();
            $tmp->closeCursor();
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return ($resultData);
    }

    // executes sql query to change db data
    public function change_db_data($sql, $data) {
        $tmp = null;
        try {
            $tmp = $this->_connection->prepare($sql);
            if (!is_null($data)) {
                for ($c = 0; $c < count($data); $c++) {
                    $tmp->bindParam((string)($c + 1), $data[$c]);
                }
            }
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return ($tmp->execute());
    }

    public function __destruct() {
        $this->_connection = null;
    }
}
?>
