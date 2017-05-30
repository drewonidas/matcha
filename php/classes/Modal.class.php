<?php
/*
@Author: Dregend Drewonidas <root>
@Date:   Friday, October 21, 2016 2:15 PM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Thursday, November 10, 2016 2:35 AM
@License: maDezynIzM.E. 2016
*/
    require('../config/database.php');

    class Modal {
        private $_connection;

        public function __construct() {
            $this->_connection = Modal::createDBConnection();
        }

        public static function createDBConnection() {
            $dsn = $GLOBALS['DB_DSN'];
            $uname = $GLOBALS['DB_USER'];
            $pwd = $GLOBALS['DB_PASSWORD'];
            $new_conn = null;
            try {
                $new_conn = new PDO($dsn, $uname, $pwd);
                // set the PDO error mode to exception
                $new_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return ($new_conn);
            } catch(PDOException $e) {
                echo 'something went wrong:' . $e->getMessage() . '<br/>';
            }
        }

        public static function generate_sql($data_set) {
            $sql = '';
            switch ($data_set) {
                case 'get_user':
                    $sql = 'SELECT id, username, email, first_name, last_name,
                            gender, sexual_pref, bio, interests, location,
                            last_in, rating, image_id
                            FROM users
                            WHERE username = ?
                            AND password = ?';
                    break;
                case 'get_all_users':
                    $sql = 'SELECT username, first_name, last_name, gender,
                            sexual_pref, bio, interests, location, last_in,
                            rating, image_id
                            FROM users';
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
                    $sql = 'INSERT INTO users (username, email, password)
                            VALUES (?, ?, ?)';
                    break;
                case 'new_comm':
                    $sql = 'INSERT INTO comments (comm_text, type, user_id, img_id)
                            VALUES (?, ?, ?, ?)';
                    break;
                case 'del_user':
                    $sql = 'DELETE FROM users
                            WHERE id = ?';
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
                            SET username=?, email=? first_name=?, last_name=?,
                            gender=?, sexual_pref=?, bio=?, interests=?,
                            location=?, image_id=?
                            WHERE id';
                case 'edit_password':
                    $sql = 'UPDATE users SET password = ?
                            WHERE id = ?';
                    break;
                case 'verify_user':
                    $sql = 'UPDATE users SET verified = true';
                    break;
                default :
                    break;
            }
            return ($sql);
        }

        public function get_connection() {
            return ($this->_connection);
        }

        public function verify_user($user_id, $ver_code) {
            $sql = get_sql('verify_user');
            if ($sql) {
                $this->change_db_data($this->_connection, $sql, null);
            }
            echo 'Alls Good<br/>';
        }

        // returns data from the sql query call
        public function get_db_data($sql, $data) {
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
                return ($resultData);
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        // executes sql query to change db data
        public function change_db_data($sql, $data) {
            try {
                $tmp = $this->_connection->prepare($sql);
                if (!is_null($data)) {
                    for ($c = 0; $c < count($data); $c++) {
                        $tmp->bindParam((string)($c + 1), $data[$c]);
                    }
                }
                return ($tmp->execute());
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        public function __destruct() {
            $this->_connection = null;
        }
    }
?>
