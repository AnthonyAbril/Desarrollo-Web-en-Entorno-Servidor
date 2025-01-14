<?php 
 
class User { 
    private static $userFile = '../data/users.json'; 
 
    public static function register($username, $password) { 
        $users = self::getAllUsers(); 
        foreach ($users as $user) { 
            if ($user['username'] === $username) { 
                return false; // Usuario ya registrado 
            } 
        } 
 
        $users[] = ['username' => $username, 'password' => $password]; 
        file_put_contents(self::$userFile, json_encode($users, JSON_PRETTY_PRINT)); 
        return true; 
    } 
 
    public static function authenticate($username, $password) { 
        $users = self::getAllUsers(); 
        foreach ($users as $user) { 
            if ($user['username'] === $username && $user['password'] === $password) { 
                return true; 
            } 
        } 
        return false; 
    } 
 
    private static function getAllUsers() { 
        return file_exists(self::$userFile) ? json_decode(file_get_contents(self::$userFile), true) : []; 
    } 
} 
?> 
