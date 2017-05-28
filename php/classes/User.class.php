<?php
/**
 * Created by PhpStorm.
 * User: infinite
 * Date: 5/17/17
 * Time: 10:48 PM
 */

class User {
    private $_userID;
    private $_username;
    private $_password;
    private $_email;
    private $_first_name;
    private $_last_name;
    private $_gender;
    private $_sex_preferences;
    private $_bio;
    private $_interests;
    private $_reg_date;
    private $_location;
    private $_verified;
    private $_last_in;
    private $_rating;
    private $_imageID;

    /**
     * User constructor.
     * @param $_userID
     * @param $_username
     * @param $_password
     * @param $_email
     * @param $_first_name
     * @param $_last_name
     * @param $_gender
     * @param $_sex_preferences
     * @param $_rating
     * @param $_bio
     * @param $_interests
     * @param $_reg_date
     * @param $_location
     * @param $_verified
     * @param $_last_in
     * @param $_imageID
     */
    public function __construct($_userID, $_username, $_password, $_email, $_first_name, $_last_name, $_gender, $_sex_preferences, $_rating, $_bio, $_interests, $_reg_date, $_location, $_verified, $_last_in, $_imageID) {
        $this->_userID = $_userID;
        $this->_username = $_username;
        $this->_password = $_password;
        $this->_email = $_email;
        $this->_first_name = $_first_name;
        $this->_last_name = $_last_name;
        $this->_gender = $_gender;
        $this->_sex_preferences = $_sex_preferences;
        $this->_rating = $_rating;
        $this->_bio = $_bio;
        $this->_interests = $_interests;
        $this->_reg_date = $_reg_date;
        $this->_location = $_location;
        $this->_verified = $_verified;
        $this->_last_in = $_last_in;
        $this->_imageID = $_imageID;
    }

    /**
     * @return mixed
     */
    public function getUserID() {
        return $this->_userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID) {
        $this->_userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getUsername() {
        return $this->_username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username) {
        $this->_username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword() {
        return $this->_password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password) {
        $this->_password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email) {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getFirstName() {
        return $this->_first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name) {
        $this->_first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName() {
        return $this->_last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name) {
        $this->_last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getGender() {
        return $this->_gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender) {
        $this->_gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getSexPreferences() {
        return $this->_sex_preferences;
    }

    /**
     * @param mixed $sex_preferences
     */
    public function setSexPreferences($sex_preferences) {
        $this->_sex_preferences = $sex_preferences;
    }

    /**
     * @return mixed
     */
    public function getRating() {
        return $this->_rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating) {
        $this->_rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getBio() {
        return $this->_bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio) {
        $this->_bio = $bio;
    }

    /**
     * @return mixed
     */
    public function getInterests() {
        return $this->_interests;
    }

    /**
     * @param mixed $interests
     */
    public function setInterests($interests) {
        $this->_interests = $interests;
    }

    /**
     * @return mixed
     */
    public function getRegDate() {
        return $this->_reg_date;
    }

    /**
     * @param mixed $reg_date
     */
    public function setRegDate($reg_date) {
        $this->_reg_date = $reg_date;
    }

    /**
     * @return mixed
     */
    public function getLocation() {
        return $this->_location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location) {
        $this->_location = $location;
    }

    /**
     * @return mixed
     */
    public function getVerified() {
        return $this->_verified;
    }

    /**
     * @param mixed $verified
     */
    public function setVerified($verified) {
        $this->_verified = $verified;
    }

    /**
     * @return mixed
     */
    public function getLastIn() {
        return $this->_last_in;
    }

    /**
     * @param mixed $last_in
     */
    public function setLastIn($last_in) {
        $this->_last_in = $last_in;
    }

    /**
     * @return mixed
     */
    public function getImageID() {
        return $this->_imageID;
    }

    /**
     * @param mixed $imageID
     */
    public function setImageID($imageID) {
        $this->_imageID = $imageID;
    }

}