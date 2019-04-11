<?php 
  $title = 'delete_task';
  include'header.php'
  ;?>

<?php

if(isset($_POST['Delete']))
{
$id = $_POST['id'];
$sql = "DELETE from events WHERE id=".$id;
$result = mysqli_query($con, $sql);
	if($result==1)
	{$status="done";
	}
	else
	{
		$status="notdone";
	}

	header("Location: c.php?status=$status");
}
/*
try {
	require "db_config.php";
} catch(Exception $e) {
	exit('Unable to connect to database.');
}*/






?>

<?php //include'footer.php';  ?>

