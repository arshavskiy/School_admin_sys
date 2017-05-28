<?php
$row = Fetcher::fetchStudentDetails ($_SESSION["student"], 'students');
?> 
<div class="main_head">
    <span>Edit / Delete a Student</span>
</div>
<span class="under_line"></span>
<div class="form">
    <form class="add_new_student" action="../api.php" method="POST" enctype="multipart/form-data" >
        <input type="submit" class="new_student_input" value="Save">
        <input type="text" class="new_student_input" name="edit_student_name" value="<?php echo $row['name'] ?>" required>
        <input type="text" class="new_student_input" name="edit_student_phone" pattern="^\d{10}$" value="<?php echo $row['phone'] ?>"required>
        <input type="email" class="new_student_input" name="edit_student_email" value="<?php echo $row['email'] ?>"required>
        <input class='pic' type="file" name="pic" accept="image/*" required>
        <img id="output"/>
        <input type="hidden" name="student_id" value="<?php echo $_SESSION["student"] ?>">
        <input type="hidden" name="action" value="edit_new_student">
        <span>Choose Courses:</span>
        <div class="checkboxes"> <?php Fetcher::fetchCourcesCheckedBoxes($_SESSION["student"]); ?> </div>
    </form>
    <form class="delete_student" action="../api.php" method="POST">
        <input type="submit" class="delete_student_button" value="delete">
        <input type="hidden" name="delete_student" value="<?php echo $_SESSION["student"] ?>">
        <input type="hidden" name="action" value="delete_student">
    </form>  
</div>
