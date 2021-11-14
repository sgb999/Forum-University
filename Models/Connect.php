<?php

require_once('Database.php');
class Connect
{
    protected $_dbConnection, $_dbInstance;
    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbConnection = $this->_dbInstance->getDbConnection();
    }
    public function checkConnect($user1, $user2){
        $sqlQuery = "SELECT id FROM connected WHERE (user1 = '$user1' OR user1 = '$user2') AND (user2 = '$user1' OR user2 = '$user2')";
        $statement = $this->_dbConnection->prepare($sqlQuery);
        $statement->execute();
        return $statement->fetch();
    }

    public function connect($user1, $user2)
    {
        $sqlQuery = "INSERT INTO connected(user1, user2) VALUES('$user1', '$user2')";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        return $statement;
    }
}