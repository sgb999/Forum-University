<?php
require_once('Database.php');
class chats
{
    protected $_dbConnection, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbConnection = $this->_dbInstance->getDbConnection();
    }
    public function getChat2($user_id, $chatID){
        $sqlQuery = "SELECT id, user2 AS userID FROM connected WHERE user1 = '" . $user_id . "' AND id > '" . $chatID . "'";
        $statement = $this->_dbConnection->prepare($sqlQuery);
        $statement->execute();
        return $statement->fetchAll();
    }
    public function getChat3($user_id, $chatID){
        $sqlQuery = "SELECT id, user1 AS userID FROM connected WHERE user2 = '" . $user_id . "' AND id > '" . $chatID . "'";
        $statement = $this->_dbConnection->prepare($sqlQuery);
        $statement->execute();
        return $statement->fetchAll();
    }
}