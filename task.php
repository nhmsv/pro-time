<?php
$title = 'update_task';
include'header.php';
include "db_config.php";



$uid = (isset($_GET['uid']))? $_GET['uid'] : 1;
$title = (isset($_GET['title']))? $_GET['title'] : null;
$start = (isset($_GET['start']))? $_GET['start'] : null;
$end = (isset($_GET['end']))? $_GET['end'] : null;


if(!empty($uid) && !empty(trim($title)) && $title != "null" && !empty($start) && !empty($end) ){

    $sql = "INSERT INTO `task` (`id`, `uid`, `Title`, `start`, `end`) VALUES (null, '$uid', '$title', '$start', '$end')";

    echo $sql;
    $result = mysqli_query($con, $sql);
    var_dump($result);

    if($result==1)
    {$status="done";
    }
    else
    {
        $status="notdone";
    }

    header("Location: task.php?status=$status");
}
?>


    <form id="contact" name="add" method="POST" action="add-item.php">

        Name  :
        <input type="text" name="name" value="" style="width:200px ; height: 20px ">
        ID:
        <input type="text" name="id" value="" style="width:200px ; height: 20px ">

        <input type="submit" value="add">  <input type="submit" value="update">  <input type="submit" value="Delete">

        <div id='calendar' style="background: #ffffff; margin-top: 20px; margin-bottom: 20px;"></div>

    </form>

<?PHP

?>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                defaultDate: '2019-04-12',
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                select: function(arg) {
                    var title = prompt('Event Title:');
                    if (title) {
                        calendar.addEvent({
                            title: title,
                            start: arg.start,
                            end: arg.end,
                            allDay: arg.allDay
                        })
                    }


                    var fullStart = convertDateYYYYMMDD(arg.start,0);
                    var fullEnd = convertDateYYYYMMDD(arg.end,-1);
                    var id = <?PHP echo $uid;?>;
                    if(id && title && fullStart && fullEnd){
                        window.location='task.php?uid='+id+'&title='+title+'&start='+ fullStart +'&end=' + fullEnd+ '';
                    }

                    calendar.unselect();



                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    <?PHP
                    $sql = "SELECT * FROM `task`";
                    $result = mysqli_query($con,$sql);

                    while ($row = mysqli_fetch_array($result, 1)) {
                    ?>
                    {

                        title: '<?PHP echo $row['title'];?>',
                        start: '<?PHP echo $row['start'];?>',
                        end: '<?PHP
                            echo date('Y-m-d', strtotime($row['end'] . ' +1 day'));
                            ?>'
                    },

                    <?PHP };?>
                ]
            });

            calendar.render();
        });


        function convertDateYYYYMMDD(myDate , per) {
            var date = new Date(myDate);

            if(per != 0)
            date.setDate(date.getDate() - 1);

            var dStart = date.getDate();
            var mStart = date.getMonth() +1;
            var yStart = date.getFullYear();
            var fullDate = yStart + "-" + mStart +"-" + dStart
            return (fullDate)? fullDate : null;
        }
    </script>

<?php include'footer.php';  ?>