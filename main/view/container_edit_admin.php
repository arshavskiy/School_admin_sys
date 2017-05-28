<?php
$row = Fetcher::fetchStudentDetails ($_SESSION["admin"], 'admins');
?>        
<div class="main_head">
    <span>Edit / Delete an Administrator</span>
</div>
<span class="under_line"></span>
<div class="form">
    <form class="add_new_admin" action="../api.php" method="POST" enctype="multipart/form-data" >
        <input type="submit" value="Edit"> 
        <input type="text" name="edit_admin_name" value="<?php echo $row['name'] ?>" required>
        <input type="text" name="edit_admin_phone" value="<?php echo $row['phone'] ?>" required>
        <input type="email" name="edit_admin_email" value='<?php echo $row['email'] ?>' required>
        <input type="text" name="edit_admin_password" placeholder="replace current password" required>
         <?php
         if ($role == 'owner' && $_SESSION["admin"] !== "3"){
         echo "<select name=" . "new_admin_role" . ">" . 
         "<option selected=" . "true" . "disabled=" . "disabled" . ">" ."Edit Admins Role" . "</option>";     
         Prints::AdminsRole () .  
         "</select>";
         } ?>
        <input class='pic' type="file" name="pic" accept="image/*" required>
        <img id="output"/>
        <input type="hidden" name="admin_id" value="<?php echo $_SESSION["admin"] ?>">
        <input type="hidden" name="action" value="edit_new_admin">
    </form>
     <?php 
     if ($role == 'owner'){
         include 'view/container_delete_admin.php';
     }
     ?>
</div>