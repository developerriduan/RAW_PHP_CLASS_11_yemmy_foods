       <?php
       
        require './inc/header.php';

       ?>
       
       
       <h1 class="h3 mb-4 text-gray-800">Welcome To Our Dashboard <strong class="text-primary"> <?=$_SESSION['auth']['first_name'] .' '.$_SESSION['auth']['last_name']?> </strong></h1>

       <?php
       
       require './inc/footer.php';

       ?>
       