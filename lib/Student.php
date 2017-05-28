<?php

class Student extends Person {
     private $courses_checked;
     private $id;
            function __construct($name, $phone, $email, $image, $courses_checked, $id = NULL) {
        parent::__construct($name, $phone, $email, $image);
        $this->courses_checked = $courses_checked;
        $this->id = $id;
    }
        public function save(){ 
            $stmt = getDBConn::getConn()->prepare("INSERT INTO students (name, phone, email, image)
            VALUES (?, ?, ?, ?)");
            $stmt->bind_param('ssss', $this->name, $this->phone,  $this->email, $this->image);
            $stmt->execute();
            $this->save_courses($this->name);
        }
        private function save_courses($new_name){
            $result = getDBConn::getConn()->query("SELECT id From students WHERE students.name = '$new_name'");
            $row = $result->fetch_assoc();
            $id = $row['id'];
            foreach($this->courses_checked as $course_id){
                getDBConn::getConn()->query("INSERT INTO students_courses (student_id, course_id)
                VALUES ($id, $course_id)");
            } 
        }
        public function update(){ 
            $stmt = getDBConn::getConn()->prepare("UPDATE students SET name = ?, phone = ?,
            email = ?, image = ? WHERE id = $this->id");
            $stmt->bind_param('ssss', $this->name, $this->phone,  $this->email, $this->image);
            $stmt->execute();
            $this->update_courses();
        }
        private function update_courses(){
            getDBConn::getConn()->query("DELETE FROM `students_courses` WHERE student_id = $this->id");
            foreach($this->courses_checked as $course_id){
                getDBConn::getConn()->query("INSERT INTO students_courses (student_id, course_id)
                VALUES ($this->id, $course_id)");
            }
        }
        public static function delete($id){
            getDBConn::getConn()->query("DELETE FROM students WHERE id = $id");
    }
}