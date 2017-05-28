<div class="main_head">
    <span>Administrators</span>
    <button class="admin_edit_button" title="Edit this Admins's info">Edit</button>
</div>
<span class="under_line"></span>
<?php
Prints::SingleAdmin($_GET['admin']);
$_SESSION["admin"] = $_GET['admin'];
?>