<main>
    <h2>School Stats:</h2>

    <div class="school_info">
        
        <div class="courses_list">
            <span>Courses:</span>
            <button class="add_course_button" title="Add a new course">+</button>
            <?php Prints::Courses('courses')?>
            <?php Prints::AmounCurs();?>
        </div>
        <div class="students_list">
            <span>Students:</span>
            <button class="add_student_button" title="Add a new student">+</button>
            <?php Prints::Students('students')?>
            <?php Prints::Amount ();?>
        </div>
        <div class="main_container">
               <?php
            //    if (!isset($_GET['student']) && !isset($_GET['course']) && !isset($_GET['add'])){ 
            //        Prints::Amount ();
            //    }      
               if (isset($_GET['student'])){
                   include 'view/container_students.php';
               }    
               if (isset($_GET['course'])){
                   include 'view/container_courses.php';    
               } 
               switch (@$_GET['add']){
                   
                   case 'course': 
                       include 'view/container_add_course.php';
                       break;
                   
                   case 'student': 
                       include 'view/container_add_student.php';
                       break; 
                   
                   case 'edit_course':
                       include 'view/container_edit_course.php';
                       break;
                   
                   case 'edit_student':
                       include 'view/container_edit_student.php';
                       break;
               } 
               ?> 
        </div>
    </div>        
</main>

