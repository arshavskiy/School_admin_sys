<?php

class getDBConn {
    private static $conn;
    
    public function getConn() {
        if (!self::$conn) {
            self::$conn = new mysqli('localhost', 'root', '', 'theschool_db');
        }
        return self::$conn;
    }
    private function __construct() {}
}


