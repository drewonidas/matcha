<?php
/**
 * Created by PhpStorm.
 * User: infinite
 * Date: 5/17/17
 * Time: 11:16 PM
 */

class Notification {
    private $_notificationID;
    private $_text;
    private $_aboutID;
    private $_date;
    private $_userID;

    /**
     * Notification.class constructor.
     * @param $_notificationID
     * @param $_text
     * @param $_aboutID
     * @param $_date
     * @param $_userID
     */
    public function __construct($_notificationID, $_text, $_aboutID, $_date, $_userID) {
        $this->_notificationID = $_notificationID;
        $this->_text = $_text;
        $this->_aboutID = $_aboutID;
        $this->_date = $_date;
        $this->_userID = $_userID;
    }

    /**
     * @return mixed
     */
    public function getNotificationID() {
        return $this->_notificationID;
    }

    /**
     * @param mixed $notificationID
     */
    public function setNotificationID($notificationID) {
        $this->_notificationID = $notificationID;
    }

    /**
     * @return mixed
     */
    public function getText() {
        return $this->_text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text) {
        $this->_text = $text;
    }

    /**
     * @return mixed
     */
    public function getAboutID() {
        return $this->_aboutID;
    }

    /**
     * @param mixed $aboutID
     */
    public function setAboutID($aboutID) {
        $this->_aboutID = $aboutID;
    }

    /**
     * @return mixed
     */
    public function getDate() {
        return $this->_date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date) {
        $this->_date = $date;
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

}