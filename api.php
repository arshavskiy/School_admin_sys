<?php
session_start();
include 'lib/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    switch ($_GET['action']){
        case 'logout':
            session_destroy();
            header("location:/theschool/");
            break;
    }
}

switch ($_POST['action']){
    
    case 'login':
        login();
        break;
    
    case 'add_new_course':
        header("location:main/index.php?subject=school&add=course");
        include 'lib/Course.php';
        $image = filter_var($_FILES['pic']['name'], FILTER_SANITIZE_STRING);
        savePic ('pic');
        $newCourse = new Course($_POST['new_course_name'], $_POST['new_course_des'], $image);
        $newCourse->save();
        break;
    
    case 'edit_new_course':
        header("location:main/index.php?subject=school&course=" . $_POST['course_id']);
        include 'lib/Course.php';
        $image = filter_var($_FILES['pic']['name'], FILTER_SANITIZE_STRING);
        savePic ('pic');
        $editCourse = new Course($_POST['edit_course_name'],
        $_POST['edit_course_des'], $image, $_POST['course_id']);
        $editCourse->update();
        break;
    
    case 'delete_course':
        header("location:main/index.php?subject=school");
        include 'lib/Course.php';
        Course::delete($_POST['course_id']);
        break;
    
    case 'add_new_student':
        include 'lib/Person.php';
        include 'lib/Student.php';
        header("location:main/index.php?subject=school&add=student");
        $image = filter_var($_FILES['pic']['name'], FILTER_SANITIZE_STRING);
        savePic ('pic');
        $newStudent = new Student($_POST['new_student_name'], $_POST['new_student_phone'],
        $_POST['new_student_email'], $image, $_POST['checkbox']);
        $newStudent->save();
        break;
    
    case 'edit_new_student':
        header("location:main/index.php?subject=school&student=" . $_POST['student_id']);
        include 'lib/Person.php';
        include 'lib/Student.php';
        $image = filter_var($_FILES['pic']['name'], FILTER_SANITIZE_STRING);
        savePic ('pic'); 
        $editStudent = new Student($_POST['edit_student_name'], $_POST['edit_student_phone'],
        $_POST['edit_student_email'], $image, $_POST['checkbox'], $_POST['student_id']);
        $editStudent->update();
        break;
    
    case 'delete_student':
        header("location:main/index.php?subject=school");
        include 'lib/Person.php';
        include 'lib/Student.php';
        Student::delete($_POST['delete_student']);
        break;
    
    case 'add_new_admin':
        header("location:main/index.php?subject=admin");   
        include 'lib/Person.php';
        include 'lib/Admin.php';
        $image = filter_var($_FILES['pic']['name'], FILTER_SANITIZE_STRING);
        savePic ('pic');
        $newAdmin = new Admin($_POST['new_admin_name'], $_POST['new_admin_phone'] ,
        $_POST['new_admin_email'], $image, $_POST['new_admin_password'], $_POST['new_admin_role']);
        $newAdmin->save();
        break;
    
    case 'edit_new_admin':
        header("location:main/index.php?subject=admin&admin=" . $_POST['admin_id']);
        include 'lib/Person.php';
        include 'lib/Admin.php';
        $image = filter_var($_FILES['pic']['name'], FILTER_SANITIZE_STRING);
        savePic ('pic');
        if (isset($_POST['new_admin_role'])){
            $editAdmin = new Admin($_POST['edit_admin_name'], $_POST['edit_admin_phone'],
            $_POST['edit_admin_email'], $image, $_POST['edit_admin_password'],
            $_POST['new_admin_role'], $_POST['admin_id']);
            $editAdmin->update();
        }else{
            $editAdmin = new Admin($_POST['edit_admin_name'], $_POST['edit_admin_phone'],
            $_POST['edit_admin_email'], $image, $_POST['edit_admin_password'], NULL,
            $_POST['admin_id']);
            $editAdmin->update();
        }
        break;
        
    case 'delete_admin':
        header("location:main/index.php?subject=admin");
        include 'lib/Person.php';
        include 'lib/Admin.php';
        Admin::delete($_POST['admin_id']);
        break;
}

function login(){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    $stmt = getDBConn::getConn()->prepare("SELECT admins.password, admins.image, roles.role as role
            from admins join roles on admins.roles_id = roles.id where name = ?");
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $stmt->bind_result($hash, $image, $role);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($password, $hash)) {
        $_SESSION["name"] = $name;
        $_SESSION["role"] = $role;
        $_SESSION["image"] = $image;
        echo 1;
    } else {
         echo 'alert';
    }
}

function savePic ($pic){
    $target_dir = "uploads/";
    $file_name = filter_var($_FILES[$pic]['name'], FILTER_SANITIZE_STRING);
    $target_file = $target_dir . basename ($file_name);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES[$pic]['tmp_name'], $target_file);
    return '<img src=' . "$target_file" . '>'; 
};