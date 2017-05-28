<form class="delete_admin" action="../api.php" method="POST">
    <input type="submit" class="delete_admin_button" value="delete">
    <input type="hidden" name="admin_id" value="<?php echo $_SESSION["admin"] ?>">
    <input type="hidden" name="action" value="delete_admin">
</form>  
