<div class="main_head">
    <span>Course</span>
    <?php
    if ($role !== 'sales'){
        echo "<button class=" . "course_edit_button" . " " . "title=" . "Edit this course" . ">Edit</button>";
    }
    ?>
</div>
<span class="under_line"></span>
<?php
Prints::SingleCourse($_GET['course']);
Prints::CourseStudnets($_GET['course']);
$_SESSION["course"] = $_GET['course'];
?>