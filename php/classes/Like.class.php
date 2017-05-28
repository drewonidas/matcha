<?php
    class Like {
        private $_likeID;
        private $_type;
        private $_text;
        private $_date;
        private $_user1ID;
        private $_user2ID;

        /**
         * Like constructor.
         * @param $_likeID
         * @param $_type
         * @param $_text
         * @param $_date
         * @param $_user1ID
         * @param $_user2ID
         */
        public function __construct($_likeID, $_type, $_text, $_date, $_user1ID, $_user2ID) {
            $this->_likeID = $_likeID;
            $this->_type = $_type;
            $this->_text = $_text;
            $this->_date = $_date;
            $this->_user1ID = $_user1ID;
            $this->_user2ID = $_user2ID;
        }

        /**
         * @return mixed
         */
        public function getLikeID() {
            return $this->_likeID;
        }

        /**
         * @param mixed $likeID
         */
        public function setLikeID($likeID) {
            $this->_likeID = $likeID;
        }

        /**
         * @return mixed
         */
        public function getType() {
            return $this->_type;
        }

        /**
         * @param mixed $type
         */
        public function setType($type) {
            $this->_type = $type;
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
?>