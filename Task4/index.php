<?php
    include "views/header.php";
    include "includes/functions.php";
    
?>


<div class="index-text container mt-5">
    <h1 class="index-h1">check what our customers bought from us (very private data only for you cause we love you xoxoxoxo)</h1>
    <small class="lead my-5" >Believe me its not a virus</small>
</div>


<div class = "container my-5 text-center">
<a href="tbb.php" class="btn btn-primary">Table Browse Button ya Samir enta we Tarek Doso fel 2a5r</a>
</div>

<?php 
    if(isset($_GET['status'])){
    $status = $_GET['status'];
    
    if($status=='success'){
        echo '<div class="alert alert-success" role="alert">
               Purchase has been done succesfully
               </div>';
    }
    }


?>
<?php

    include "views/footer.php";

?>