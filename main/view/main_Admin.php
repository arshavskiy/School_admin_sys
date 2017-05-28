<main>
    <h2>Administrators Info:</h2>
   
    <div class="admins_info">
        <div class="admins_list">
            <span>Administrators:</span>
            <button class="new_admins_button" title="Add a new administrator">+</button>
            <?php  if ($_SESSION["role"] == 'owner') {
                       Prints::Admins('admins', 'roles');
                    }else{
                        Prints::AdminsByRole('admins', 'roles'); 
                    }             
            ?>
        </div>
        <div class="main_container">
            <?php
                if (!isset($_GET['admin']) && !isset($_GET['add'])){
                    Prints::AmountOfAdmins();
                }
                if (isset($_GET['admin'])){
                     include 'view/container_admins.php'; 
                }
                 switch (@$_GET['add']){
                     
                     case 'admin':
                         include 'view/container_add_admins.php';
                         break;
                     
                     case 'edit_admin':
                         include 'view/container_edit_admin.php';
                         break;
                } 
            ?> 
        </div>
    </div>        
</main>