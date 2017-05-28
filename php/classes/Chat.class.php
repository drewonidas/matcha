<?php
/**
 * Created by PhpStorm.
 * User: infinite
 * Date: 5/17/17
 * Time: 11:30 PM
 */

class Chat {
    private $_chatID;
    private $_user1ID;
    private $_user2ID;

    /**
     * Chat constructor.
     * @param $_chatID
     * @param $_user1ID
     * @param $_user2ID
     */
    public function __construct($_chatID, $_user1ID, $_user2ID) {
        $this->_chatID = $_chatID;
        $this->_user1ID = $_user1ID;
        $this->_user2ID = $_user2ID;
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
    public function getUser1ID() {
        return $this->_user1ID;
    }

    /**
     * @param mixed $user1ID
     */
    public function setUser1ID($user1ID) {
        $this->_user1ID = $user1ID;
    }

    /**
     * @return mixed
     */
    public function getUser2ID() {
        return $this->_user2ID;
    }

    /**
     * @param mixed $user2ID
     */
    public function setUser2ID($user2ID) {
        $this->_user2ID = $user2ID;
    }

}