<?php

class Course {
    private $id;
    private $name;
    private $des;
    private $image;
    public function __construct($name, $des, $image, $id = NULL) {    
        $this->name = filter_var($name, FILTER_SANITIZE_STRING);
        $this->des = filter_var($des, FILTER_SANITIZE_STRING);
        $this->image = $image;
        $this->id = $id;
    }
    public function save(){ 
        $stmt = getDBConn::getConn()->prepare("INSERT INTO courses (name, des, image)
            VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $this->name, $this->des, $this->image);
        $stmt->execute();
    }
    public function update(){ 
        $stmt = getDBConn::getConn()->prepare("UPDATE courses SET name = ?, des = ?, image = ?
         WHERE id = $this->id");
        $stmt->bind_param('sss', $this->name, $this->des, $this->image);
        $stmt->execute();
    }
    public static function delete($id){
        getDBConn::getConn()->query("DELETE FROM courses WHERE id = $id");
    }
}