<?php 

  $connection= mysqli_connect('localhost','root','','library');
    if($connection){
        echo'we re in';
    }else{
        echo 'error';
    }

    ?>