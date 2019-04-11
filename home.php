
 <?php 
  $title = 'Home';
  include'header.php'
  ;?>
          
<div id="wrapper" >
      <div id="contents">
          <form class="home">
              <div style=" display: inline-block;">
  
                  <img src="img/individual.jpg" hspace="50" class="choose" style="width:500px;height:260px;margin:auto; " /> 
                <div class="f ">
                      <div class="bt">
               <input type="button"  name ="b3" class=" b"value ="      Add Task       "  onclick="window.location.href='last-update.php'"/>
                    </div>
                    <div class="bt">
               <input type="button"  name ="b3" class=" b"value ="      View Task       "  onclick="window.location.href='last-update.php'"/>
                    </div>
                        <div class="bt">
     <input type="button"  class="b " value="    Update Task      " onclick="window.location.href='update_task.php'" />
                        </div>
       <input type="button"  class="b " value="    Delete Task     "    onclick="window.location.href='delete.php'"/>
                </div>
              </div>
            </form>
             </div>
    </div>



            <?php include'footer.php';?>