<div class="main_head">
    <span>Student</span>
    <button class="student_edit_button" title="Edit this student's info">Edit</button>
</div>
<span class="under_line"></span>
<?php
Prints::SingleStudent ($_GET['student']);
Prints::StudentCourses ($_GET['student']);
$_SESSION["student"] = $_GET['student'];
?>

