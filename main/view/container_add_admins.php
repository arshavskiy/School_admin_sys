<div class="main_head">
    <span>Add New Administrator</span>
</div>
<span class="under_line"></span>
<form class="add_new_admin" action="../api.php" method="POST" enctype="multipart/form-data" >
    <input type="submit"  value="Save">
    <input type="text" name="new_admin_name" placeholder="New Admin's Name" required>
    <input type="text" name="new_admin_phone" placeholder="New Admin's Phone" pattern="^\d{10}$" required>
    <input type="email" name="new_admin_email" placeholder="New Admin's E-mail" required>
    <input type="text" name="new_admin_password" placeholder="New Admin's Password" required>
    <select name="new_admin_role">
    <option selected="true" disabled="disabled">New Admins Role</option>     
    <?php Prints::AdminsRole(); ?>
    </select>
    <input class='pic' type="file" name="pic" accept="image/*" required>
    <img id="output"/>
    <input type="hidden" name="action" value="add_new_admin">
</form>