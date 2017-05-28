<?php
/**
 * Created by PhpStorm.
 * User: infinite
 * Date: 5/17/17
 * Time: 11:11 PM
 */

class Message {
    private $_messageID;
    private $_text;
    private $_chatID;
    private $_date;
    private $_senderID;
    private $_recipientID;

    /**
     * Message constructor.
     * @param $_messageID
     * @param $_text
     * @param $_chatID
     * @param $_senderID
     * @param $_recipientID
     */
    public function __construct($_messageID, $_text, $_chatID, $_senderID, $_recipientID, $_date) {
        $this->_messageID = $_messageID;
        $this->_text = $_text;
        $this->_chatID = $_chatID;
        $this->_senderID = $_senderID;
        $this->_recipientID = $_recipientID;
        $this->_date = $_date;
    }

    /**
     * @return mixed
     */
    public function getMessageID() {
        return $this->_messageID;
    }

    /**
     * @param mixed $messageID
     */
    public function setMessageID($messageID) {
        $this->_messageID = $messageID;
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
    public function getChatID() {
        return $this->_chatID;
    }

    /**
     * @param mixed $chatID
     */
    public function setChatID($chatID) {
        $this->_chatID = $chatID;
    }

    /**
     * @return mixed
     */
    public function getSenderID() {
        return $this->_senderID;
    }

    /**
     * @param mixed $senderID
     */
    public function setSenderID($senderID) {
        $this->_senderID = $senderID;
    }

    /**
     * @return mixed
     */
    public function getRecipientID() {
        return $this->_recipientID;
    }

    /**
     * @param mixed $recipientID
     */
    public function setRecipientID($recipientID) {
        $this->_recipientID = $recipientID;
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

}