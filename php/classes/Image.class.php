<?php
/**
 * Created by PhpStorm.
 * User: infinite
 * Date: 5/17/17
 * Time: 11:26 PM
 */

class Image {
    private $_imageID;
    private $_imageData;
    private $_date;
    private $_userID;

    /**
     * Image constructor.
     * @param $_imageID
     * @param $_imageData
     * @param $_date
     * @param $_userID
     */
    public function __construct($_imageID, $_imageData, $_date, $_userID) {
        $this->_imageID = $_imageID;
        $this->_imageData = $_imageData;
        $this->_date = $_date;
        $this->_userID = $_userID;
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

    /**
     * @return mixed
     */
    public function getImageData() {
        return $this->_imageData;
    }

    /**
     * @param mixed $imageData
     */
    public function setImageData($imageData) {
        $this->_imageData = $imageData;
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