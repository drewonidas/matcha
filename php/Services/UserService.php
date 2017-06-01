<?php

require("classes/Modal.class.php");

function getUser($username, $password) {
  $modal = new Modal();
  $args = array($username, $password);
  $sql = Modal::generate_sql('get_user');
  $data = $modal->get_db_data($sql, $args);
  return $data;
  //print_r($users);
}

function getAllUsers() {
  $modal = new Modal();
  $sql = Modal::generate_sql('get_all_users');
  $data = $modal->get_db_data($sql, null);
  return ($data);
}

function addNewUser($username, $email, $password) {
  $modal = new Modal();
  $data = array($username, $email, $password);
  $sql = Modal::generate_sql('new_user');
  print_r($modal->change_db_data($sql, $data));
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
