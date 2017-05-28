<div class="main_head">
    <span>Add New Student</span>
</div>
<span class="under_line"></span>
<form class="add_new_student" action="../api.php" method="POST" enctype="multipart/form-data" >
    <input type="text" class="new_student_input" name="new_student_name" placeholder="New Student's Name" required>
    <input type="text" class="new_student_input" name="new_student_phone" placeholder="New Student's Phone" pattern="^\d{10}$" required>
    <input type="email" class="new_student_input" name="new_student_email" placeholder="New Student's E-mail" required>
    <input class='pic' type="file" name="pic" accept="image/*" required>
    <input type="submit" class="new_student_input" value="Save">
    <img id="output"/>
    <input type="hidden" name="action" value="add_new_student">
    <span>Choose Courses:</span>
    <div class="checkboxes"> <?php Prints::CoursesCheckBoxes(); ?> </div>
</form>
