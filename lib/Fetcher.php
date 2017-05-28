<?php
include 'DB.php';
include 'Printer.php';

class Fetcher {
    
    public static function fetchCourses ($table_name){
        $result = getDBConn::getConn()->query("SELECT id, name,image FROM $table_name ORDER BY id DESC");
        return $result;
    }
    
    public static function fetchstudents ($table_name){
        $result = getDBConn::getConn()->query("SELECT id, name, image, email FROM $table_name ORDER BY id DESC");
        return $result;

    }
    
    public static function fetchAdmins ($table_name, $table_joined){
        $result = getDBConn::getConn()->query("SELECT $table_name.id, $table_name.name, $table_name.phone,
        $table_name.email, $table_name.image, $table_joined.role
        FROM $table_name JOIN $table_joined on $table_name.roles_id = $table_joined.id");
        return $result;
    }
    
    public static function fetchAdminsByRoles ($table_name, $table_joined){
        $result = getDBConn::getConn()->query("SELECT $table_name.id, $table_name.name, $table_name.phone,
        $table_name.email, $table_name.image, $table_joined.role
        FROM $table_name JOIN $table_joined on $table_name.roles_id = $table_joined.id WHERE $table_joined.id != 1;");
        return $result;
    }
    
    public static function fetchSingleStudent ($studentId){
        $result = getDBConn::getConn()->query("SELECT name,phone,email,image FROM students WHERE id = $studentId ;");
        return $result;
    }
    
    public static function fetchStudentCourses ($studentId){
        $result = getDBConn::getConn()->query("SELECT courses.name, courses.image
        FROM courses
        JOIN students_courses ON courses.id = students_courses.course_id WHERE student_id = $studentId");
        return $result;
    }
    
    public static function fetchSinglecourse ($courseId){
        $result = getDBConn::getConn()->query("SELECT courses.name, courses.des, courses.image FROM courses
        JOIN students_courses ON courses.id = students_courses.course_id 
        WHERE courses.id = $courseId;");
        return $result;
    }
    
    public static function fetchCourseStudents ($courseId){
        $result = getDBConn::getConn()->query("SELECT students.name, students.image 
        FROM students 
        JOIN students_courses ON students.id = students_courses.student_id WHERE course_id = $courseId");
        return $result;    
    }
    
    public static function fetchSingleAdmin($adminId){
        $result = getDBConn::getConn()->query("SELECT admins.name, admins.phone, admins.email, admins.image, roles.role
        FROM admins 
        JOIN roles ON admins.roles_id = roles.id WHERE admins.id = $adminId");
        return $result;           
    } 
      
    public static function fetchCourcesCheckBox(){
        $result = getDBConn::getConn()->query("SELECT courses.id, courses.name From courses;");
        return $result;  
    }
       
    public static function fetchAdminsRoles (){
        $result = getDBConn::getConn()->query("SELECT roles.id, roles.role From roles WHERE roles.id != 1;");
        return $result;   
       }
       
    public static function fetchCourseDetails ($course_id){
        $result = getDBConn::getConn()->query("SELECT name, des FROM courses WHERE id = $course_id");
        $row = $result->fetch_assoc();
        return $row;
    }
    
    public static function fetchStudentDetails ($student_id, $table){
        $result = getDBConn::getConn()->query("SELECT name, phone, email FROM $table WHERE id = $student_id");
        $row = $result->fetch_assoc();
        return $row;
    }
    
    public static function fetchAmount($table){
        $result = getDBConn::getConn()->query("SELECT * FROM $table"); 
        $amount = $result->num_rows;
        return $amount;
    } 
    
    public static function fetchAmountOfStudents($course_id){
        $result = getDBConn::getConn()->query("SELECT * FROM students_courses WHERE course_id = $course_id"); 
        $amount = $result->num_rows;
        return $amount;
    }

    public static function  fetchCourcesCheckedBoxes($student_id){
        $result1 = getDBConn::getConn()->query("SELECT course_id FROM students_courses
        WHERE student_id = $student_id");
        while ($row1 = $result1->fetch_assoc()) {
            $courses[] = $row1['course_id'];
        }
        
        $result = getDBConn::getConn()->query("SELECT courses.id, courses.name From courses;");              
            while ($row = $result->fetch_assoc()) { 
                if (in_array($row['id'], $courses)){
                    $checked = "checked";
                }else {
                    $checked = "";
                }
                Prints::SudentCoursesCheckBoxes ($row, $checked);              
        }
    } 
}



