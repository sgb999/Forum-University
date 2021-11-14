<?php
require_once('Database.php');
class Messages
{
    protected $_dbConnection, $_dbInstance;
    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbConnection = $this->_dbInstance->getDbConnection();
    }
    public function readMessage($con_id, $lastMessageId) :array
    {
        $sqlQuery = "SELECT message.id, message.text, message.timesent, users.userName FROM forum.message, forum.users WHERE connected = 1 AND users.userName = (SELECT userName FROM forum.users WHERE users.id = message.user) AND message.id > $lastMessageId;";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    public function sendMessage($message, $userId, $conID)
    {
        $sqlQuery = "INSERT INTO message(text, timesent, user, connected) VALUES('$message', NOW(), '$userId', '$conID')";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        return $statement;
    }
}