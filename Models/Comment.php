<?php
require_once('Database.php');
class Comment
{
    protected $_dbConnection, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbConnection = $this->_dbInstance->getDbConnection();
    }

    public function setComment($content, $postID, $userID)
    {
        $sqlQuery = "INSERT INTO comments(content, post, replyBy, date) VALUES('$content', $postID, '$userID', NOW())";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        return $statement->fetch();
    }

    public function getComment($postID, $date)
    {
        $sqlQuery = "SELECT comments.id, comments.content, users.id AS userId, users.userName, comments.date FROM comments, users WHERE replyBy = users.id AND comments.post = '$postID' AND comments.date < '$date' ORDER BY comments.date ASC limit 10";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
}