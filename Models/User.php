<?php
require_once('Database.php');
class User
{
    protected $_dbConnection, $_dbInstance;
    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbConnection = $this->_dbInstance->getDbConnection();
    }
    public function addUser($firstName, $lastName, $userName, $password, $email)
    {
        $sqlQuery = "INSERT INTO users(firstName, lastName, userName, pass, email) VALUES('$firstName', '$lastName', '$userName', sha2('$password', 512),'$email')";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        return $statement;
    }
    public function login($userName, $password)
    {
        $sqlQuery = "SELECT id, userName FROM users WHERE userName = '$userName' AND pass = sha2('$password', 512)";
        $statement = $this->_dbConnection->prepare($sqlQuery);
        $statement->execute();
        return $statement->fetch();
    }
    public function getUserNameById($userID)
    {
        $sqlQuery = "SELECT userName FROM users WHERE id = '$userID'";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }

    public function getUserNameByName($userName)
    {
        $sqlQuery = "SELECT userName FROM users WHERE id = '$userName'";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        return $statement->fetch();
    }

    public function getUserEmailByEmail($userID)
    {
        $sqlQuery = "SELECT email FROM users WHERE email = '$userID'";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        return $statement->fetch();
    }
}