<?php

require_once('Database.php');
class Replies
{
    protected $_dbConnection, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbConnection = $this->_dbInstance->getDbConnection();
    }
    public function setComment($reply, $postID, $userID)
    {
        $sqlQuery = "INSERT INTO replies(reply, reply_date, reply_by, reply_to) VALUES('" . ($reply) . "', NOW(), " . "('$userID')" . ", " . ($postID) . ")";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        return $statement->fetchAll();
    }
    public function sendComment($reply, $postID, $userID)
    {
        $sqlQuery = "INSERT INTO replies(reply, reply_date, reply_by, reply_to) VALUES('" . ($reply) . "', NOW(), " . "('$userID')" . ", " . ($postID) . ")";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        return $statement->fetchAll();
    }
}