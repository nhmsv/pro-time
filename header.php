<?PHP
session_start();
include "db_config.php";

$logged_in = (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) ? true : false;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <title>Time Management- <?php echo $title?> </title>
       <link rel="stylesheet" href="css/style.css" type="text/css">

        <link href='css/packages/core/main.css' rel='stylesheet' />
        <link href='css/packages/daygrid/main.css' rel='stylesheet' />
        <link href='css/packages/timegrid/main.css' rel='stylesheet' />
        <script src='css/packages/core/main.js'></script>
        <script src='css/packages/interaction/main.js'></script>
        <script src='css/packages/daygrid/main.js'></script>
        <script src='css/packages/timegrid/main.js'></script>
    </head>

    
    <body>
        
        <div id="wrapper">
  
            
            <div id="header" >
            
            
           <img  src="img/timelogo2.jpg " />
           
            <h3>Time Management System<br>Track and manage employees works</h3><br>
          
             <ul>
             <li><a href="index.php">Home</a></li>
              <li><a href="about.php"> About</a></li>
                 <?PHP if($logged_in):?>
                     <li><a href="task.php">New Task</a></li>
                     <li><a href="my_tasks.php">My Tasks</a></li>
                     <li><a href="mailto:<?PHP echo $_SESSION['Email'];?>"><?PHP echo $_SESSION['Name'];?></a></li>
                     <li><a href="logout.php"> Logout</a></li>
                 <?PHP endif;?>


             
   
              </ul>
            
            
    </div>
          
            
        
         </div>
            
            
            
            
            
            
