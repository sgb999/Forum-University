<?php
require_once('Database.php');

class Posts
{
    protected $_dbConnection, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbConnection = $this->_dbInstance->getDbConnection();
    }

    public function getPosts($postId)
    {
        $sqlQuery = "SELECT posts.id, posts.header, posts.content, users.id AS userId, users.userName, posts.date FROM posts, users WHERE posts.postBy = users.id AND posts.id = '$postId'";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetch();
    }

    public function getMorePosts($topic_id, $userDate)
    {
        $sqlQuery = "SELECT post_content, user_id, user_name, post_date FROM posts,users WHERE post_by = user_id AND post_topic = '$topic_id' AND post_date < '$userDate' ORDER BY post_date";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }

    public function getComment($postID)
    {
        $sqlQuery = "SELECT comments.id, comments.content, users.id AS userId, users.userName, comments.date FROM comments, users WHERE replyBy = users.id AND comments.post = '$postID' ORDER BY comments.date ASC limit 10";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }

    public function getMoreComments($postID, $replyID)
    {
        $sqlQuery = "SELECT reply, user_id, user_name, reply_date FROM replies, users WHERE reply_by = user_id AND reply_to = '$postID' AND reply_id > '$replyID' ORDER BY reply_date ASC limit 10";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }

    public function loadComments($postID, $replyID)
    {
        $sqlQuery = "SELECT replies_id, reply, user_id, user_name, reply_date FROM replies, users WHERE reply_by = user_id AND reply_to = '$postID' AND replies_id > '$replyID' ORDER BY reply_date ASC limit 10";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }

    public function getUserPosts($userID)
    {
        $sqlQuery = "SELECT posts.content, posts.date FROM posts WHERE posts.postBy = '$userID' ORDER BY posts.date ASC limit 10";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }

    public function getMoreUserPosts($userID, $date)
    {
        $sqlQuery = "SELECT content, date FROM posts WHERE postBy = '$userID' AND date > '$date' ORDER BY date ASC limit 10";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }

    public function setPost($header, $content, $userId, $categoryId)
    {
        $sqlQuery = "INSERT INTO posts(header, content, postBy, date, category) VALUES('$header', '$content', '$userId', NOW(), '$categoryId')";
        $statement = $this->_dbConnection->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        return $statement;
    }
}