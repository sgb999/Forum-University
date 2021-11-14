<?php
require_once('Database.php');
class Topics
{
    protected $_dbConnection, $_dbInstance;
    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbConnection = $this->_dbInstance->getDbConnection();
    }
    public function getSelectedTopics($postCat)
    {
        $sqlQuery = "SELECT posts.id, posts.header, categories.name, users.userName, posts.date FROM posts, categories, users WHERE posts.postBy = users.id AND posts.category = categories.id AND posts.category = '$postCat' ORDER BY posts.date DESC limit 10";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    public function getMoreTopics($postCat, $date)
    {
        $sqlQuery = "SELECT posts.id, posts.header, categories.name, users.userName, posts.date FROM posts, categories, users WHERE posts.postBy = users.id AND posts.category = categories.id AND posts.category = '$postCat' AND posts.date < '$date' ORDER BY posts.date DESC limit 10";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    public function getTopicHeader($topicID)
    {
        $sqlQuery = "SELECT topic_subject FROM topics WHERE topic_id = '$topicID'";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    public function getTopicID($userID)
    {
        $sqlQuery = "SELECT topic_id FROM topics WHERE topic_by = '$userID' ORDER BY topic_id DESC limit 1";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    public function setTopics($topicSubject, $catID, $userID)
    {
        $sqlQuery = "INSERT INTO topics(topic_subject, topic_date, topic_cat, topic_by) VALUES('" . ($topicSubject) . "', NOW(), " . "($catID)" . ", " . ($userID) . ")";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        return $statement;
    }
}