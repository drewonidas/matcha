<?php

require("classes/Modal.class.php");
$modal = new Modal();

function getUser($username, $password) {
  $args = array($username, $password);
  $sql = Modal::generate_sql('get_user');
  $data = $GLOBALS['modal']->get_db_data($sql, $args);
  return $data;
}

function getAllUsers($user) {
  $sql = Modal::generate_sql('get_all_users');
  $args = array($user);
  $data = $GLOBALS['modal']->get_db_data($sql, $args);
  return ($data);
}

function addNewUser($username, $email, $password) {
  $args = array($username, $email, $password);
  $sql = Modal::generate_sql('new_user');
  $data = $GLOBALS['modal']->change_db_data($sql, $args);
  return ($data);
}

// function changeDetails($userid) {
//   $modal = new Modal();
//   $args = array('Drewonidas', 'dlaminiandrew@gmail.com', 'Andrew', 'Dlamini'
//                 'male', 'males', 'I like em k..... ;)', '#cars#music',
//                 '', '', '');
//   $sql = Modal::generate_sql('edit_profile');
//   $response = $modal->change_db_data($sql, $args);
//   echo "changeDetails test </br>";
//   print_r($response);
// }
?>
