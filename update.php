<?php /*
  $title = 'update_task';
  include'header.php'*/
  ;?>

<?php


if(isset($_POST['update']))
{
$id=$_POST['ID'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];


            //STEP 4: Create the Query
 $query = "UPDATE stuff SET Title='$title', start= '$start', end=$end WHERE id=$id";  
//STEP 5: Run the Query
            $res = mysqli_query($con, $query);
         
 
               //STEP 6: Check the result
            if($res==1)
            {
                $status = "done";
            }
            else
            {
                $status = "notdone";
            }
 header("Location: c.php?status=$status");
 $res->execute(array($title,$start,$end,$id));   
    exit();
    
}


/*
try {
 	require "db_config.php";
} catch(Exception $e) {
	exit('Unable to connect to database.');
}*/





?>

<?php //include'footer.php';  ?>
