<?php

require_once('Database.php');

class MySQL
{
    protected $_dbConnection, $_dbInstance;


    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbConnection = $this->_dbInstance->getDbConnection();
    }



    public function getUserName($userID)
    {
        $sqlQuery = "SELECT userName FROM users WHERE id = '$userID'";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }

    public function setPosts($sqlQuery1, $sqlQuery2)
    {
        $sqlQuery = "INSERT INTO posts(post_content, post_date, post_topic, post_by) VALUES('" . $sqlQuery1 . "', NOW(), " . "$sqlQuery2" . ", " . $_SESSION['user_id'] . ")";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        var_dump($statement);
        return $statement;
    }

    public function setComment($sqlQuery1, $sqlQuery2)
    {
        $sqlQuery = "INSERT INTO posts(post_content, post_date, post_topic, post_by) VALUES('" . ($sqlQuery1) . "', NOW(), " . "$sqlQuery2" . ", " . $_SESSION['user_id'] . ")";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        return $statement;
    }

    public function setTopics($topicSubject, $catID, $userID)
    {
        $sqlQuery = "INSERT INTO topics(topic_subject, topic_date, topic_cat, topic_by) VALUES('" . ($topicSubject) . "', NOW(), " . "($catID)" . ", " . ($userID) . ")";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        //$this->setPosts();
        return $statement;
    }


}