<?php

require("classes/Modal.class.php");
$modal = new Modal();

function verifyCredentials($username, $password) {
    $args = array($username, $password);
    $sql = Modal::generate_sql('verify_user_cred');
    $data = $GLOBALS['modal']->get_db_data($sql, $args);
    return $data;
}

function getUserProfile($userID) {
  $args = array($userID);
  $sql = Modal::generate_sql('get_user_profile');
  $data = $GLOBALS['modal']->get_db_data($sql, $args);
  return $data;
}

function getMemberProfile($userID) {
    $sql = Modal::generate_sql('get_profile_info');
    $args = array($userID);
    $data = $GLOBALS['modal']->get_db_data($sql, $args);
    return ($data);
}

function getAllUsers($user) {
    $sql = Modal::generate_sql('get_all_users');
    $args = array($user);
    $data = $GLOBALS['modal']->get_db_data($sql, $args);
    return ($data);
}

function addNewUser($username, $email, $password, $fname, $lname) {
  $args = array($username, $email, $password, $fname, $lname);
  $sql = Modal::generate_sql('new_user');
  $data = $GLOBALS['modal']->change_db_data($sql, $args);
  return ($data);
}

function changeDetails($args) {
    $sql = Modal::generate_sql('edit_profile');
    $result = $GLOBALS['modal']->change_db_data($sql, $args);
    return ($result);
}

function likeUserProfile($args) {
    $sql = Modal::generate_sql('new_like');
    $result = $GLOBALS['modal']->change_db_data($sql, $args);
    return ($result);
}
