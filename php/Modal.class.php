<?php
/*
@Author: Dregend Drewonidas <root>
@Date:   Friday, October 21, 2016 2:15 PM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Thursday, November 10, 2016 2:35 AM
@License: maDezynIzM.E. 2016
*/
    require('database.php');

    class Modal {
        private $_connection;

        public function __construct() {
            $dsn = $GLOBALS['DB_DSN'];
            $uname = $GLOBALS['DB_USER'];
            $pwd = $GLOBALS['DB_PASSWORD'];
            try {
                $this->_connection = new PDO($dsn, $uname, $pwd);
                // set the PDO error mode to exception
                $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'something went wrong:' . $e->getMessage() . '<br/>';
            }
        }

        public function get_connection() {
            return ($this->_connection);
        }

        public function generate_sql($data_set) {
            $sql = '';
            switch ($data_set) {
                case 'get_user':
                    $sql = "SELECT * FROM users
                            WHERE username = ?";
                    break;
                case 'get_all_user':
                    $sql = 'SELECT * FROM users';
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
                    $sql = 'INSERT INTO users (username, f_name, l_name, email, password, location)
                            VALUES (:u, :f, :l, :e, :p, "g")';
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
                case 'ch_pwd':
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

        public function verify_user($user_id, $ver_code) {
            $sql = get_sql('verify_user');
            if ($sql) {
                $this->change_db_data($this->_connection, $sql, null);
            }
            echo 'Alls Good<br/>';
        }

        public function get_db_data($sql) {
            try {
                $data = $this->_connection->query($sql, PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo 'Error: ' . $e . '<br/>';
            }
            return ($data);
        }

        public function change_db_data($type, $sql, $data) {

            try {
                $tmp = $this->_connection->prepare($sql);
                if ($type == 'get') {
                    $tmp->execute($data);
                    $result = $tmp->fetchAll(PDO::FETCH_ASSOC);
                    return ($result);
                }
                return ($tmp->execute());
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage() . '<br/>';
            }
        }

        public function mail_user($email, $type, $subj) {
            if ($type == 'verify')
                $message = wordwrap($ver_message, 70, "\r\n");
            else
            echo 'done<br/>';
                $message = wordwrap($pwd_message, 70, "\r\n");
        }

        public function __destruct() {
            $this->_connection = null;
        }
    }
?>
