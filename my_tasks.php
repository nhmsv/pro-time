<?php
$title = 'update_task';
include'header.php';

if(!$logged_in)
    header('Location: index.php');


$uid = (isset($_SESSION['uid']))? $_SESSION['uid'] : null  ;

$deleteId = (isset($_GET['delete']))? $_GET['delete'] : 0;

if($deleteId){
    $sql = "DELETE FROM `task` WHERE `task`.`id` = $deleteId";

    $result = mysqli_query($con,$sql);

    if($result){
        header('Location: my_tasks.php');
    }

}
?>

<table class="table " style="width: 100%; background: #eeeeee">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Start</th>
        <th>End</th>
        <th>Delete</th>
    </tr>

<?PHP
$count = 0;
$sql = "SELECT * FROM `task` WHERE uid = $uid ";
$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);
if($count !=0){
while ($row = mysqli_fetch_array($result, 1)) {
    ?>
    <tr>
        <td><?PHP echo $row['id'];?></td>
        <td><div align="left"><?PHP echo $row['title'];?></div></td>
        <td><?PHP echo $row['start'];?></td>
        <td><?PHP echo $row['end'];?></td>
        <td><a class="text-danger" href="my_tasks.php?delete=<?PHP echo $row['id'];?>">Delete</a></td>

    </tr>
<?PHP }
};?>
<?PHP
    if($count == 0)
        echo "<tr><td colspan=\"5\">No Task found</td></tr>";
    ?>

    </table>



<?php include'footer.php';  ?>