<?php /*
  $title = 'update_task';
  include'header.php'*/
  ;?>

<?php
if(isset($_POST['add']))
{
$id=$_POST['ID'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];


            //STEP 4: Create the Query
           

         

$sql = "INSERT INTO events (ID,Title, start, end) VALUES ($id, $title, $start, $end )";
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
    header("Location:c.php?status=$status");
    
    exit();
}
  
    



?>

<?php //include'footer.php';  ?>

