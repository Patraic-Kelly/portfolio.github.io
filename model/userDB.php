<?php
/** User Database Functions
 * @author pkelly
 * @date 2/12/21
 * @log Create userDB.php for user management functionality
 */

function addUser($userName, $userLast, $userEmail, $userMessage) {
    
    $db = Database::getDB();
    
    $query = 'INSERT INTO users (userName, userLast, userEmail, userMessage, submitDate, modID) VALUES (:userName, :userLast, :userEmail, :userMessage, NOW(), 1);';
    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $userName);
    $statement->bindValue(':userLast', $userLast);
    $statement->bindValue(':userEmail', $userEmail);
    $statement->bindValue(':userMessage', $userMessage);
    $statement->execute();    
    $statement->closeCursor();
}

function delUser($userID) {
    $db = Database ::getDB();
     $query= 'DELETE FROM users WHERE userID = :userID;';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $statement->closeCursor();
}

function getUserByModID($modID) {
        $db = Database ::getDB();
        $query2 = 'SELECT * FROM users WHERE users.modID = :modID ORDER BY submitDate;';
        $statement2 = $db->prepare($query2);
        $statement2->bindValue(':modID', $modID);
        $statement2->execute();
        $users = $statement2;
        return $users;
        
}
?>
