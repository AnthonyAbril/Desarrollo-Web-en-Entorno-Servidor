<?php 
 
class Note { 
    private static $noteFile = '../data/notes.json'; 
 
    public static function getUserNotes($username) { 
        $notes = self::getAllNotes(); 
        $userNotes = array();

        if(!empty($notes)) {
            foreach($notes as $note) {
                if($note['username'] === $username)
                    $userNotes[] = $note;
            } 
        }
               
        return $userNotes;         
        //return array_filter($notes, fn($note) => $note['username'] === $username); 
    } 
 
    public static function addNote($username, $content) { 
        $notes = self::getAllNotes(); 
        $notes[] = ['username' => $username, 'content' => $content, 'created_at' => date('Y-m-d H:i:s')]; 
        file_put_contents(self::$noteFile, json_encode($notes, JSON_PRETTY_PRINT)); 
    } 
 
    private static function getAllNotes() { 
        return file_exists(self::$noteFile) ? json_decode(file_get_contents(self::$noteFile), true) : []; 
    } 
} 
?> 
