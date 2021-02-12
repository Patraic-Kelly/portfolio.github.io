<?php
/** Mod Database Functions
 * 
 *
 * @author pkelly
 * @date 2/12/21
 * @log Create file for getMods function 
 */

function getMods(){
        $db = Database::getDB();
            $query = 'SELECT * FROM mods ORDER BY modID;';
        $statement = $db->prepare($query);
        $statement->execute();
        $mods = $statement;
        return $mods;
}
