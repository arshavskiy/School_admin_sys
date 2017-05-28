<?php
$row = Fetcher::fetchCourseDetails ($_SESSION["course"]);
?>        
<div class="main_head">
    <span>Edit / Delete a Course</span>
</div>
<span class="under_line"></span>
<div class="form">
    <form class="add_new_course" action="../api.php" method="POST" enctype="multipart/form-data" >
        <input type="submit" value="Edit"> 
        <input type="text" name="edit_course_name"  value="<?php echo $row['name']?>" required>
        <textarea name="edit_course_des" required=><?php echo $row['des'] ?></textarea>
        <input class='pic' type="file" name="pic" accept="image/*" required>
        <img id="output"/>
        <input type="hidden" name="course_id" value="<?php echo $_SESSION["course"] ?>">
        <input type="hidden" name="action" value="edit_new_course">
        <span>Total <?php echo Fetcher::fetchAmountOfStudents($_SESSION["course"]) ?> students taking this course</span>
    </form>
    <form class="delete_course" action="../api.php" method="POST">
        <input type="submit" class="delete_course_button" value="delete">
        <input type="hidden" name="course_id" value="<?php echo $_SESSION["course"] ?>">
        <input type="hidden" name="action" value="delete_course">
    </form>  
</div>