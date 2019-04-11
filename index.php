<?php
  $title = 'sign in';
  include'header.php';

    if($logged_in)
        header('Location: home.php');

  if (isset($_POST['login'])):

      if(isset($_POST['uid'],$_POST['password']))
      {
          $uid = $_POST['uid'];
          $password = $_POST['password'];

          $query = "SELECT * FROM user WHERE id ='$uid' AND password='$password'";

          $result = mysqli_query($con, $query);
          $user =  mysqli_fetch_array($result, 1);

          if($result)
          {

              if((mysqli_num_rows($result) == 1))
              {

                  $_SESSION['uid'] = $user['id'];
                  $_SESSION['Name'] = $user['Name'];
                  $_SESSION['Email'] = $user['Email'];
                  $_SESSION['Password'] = $user['Password'];
                  $_SESSION['Department'] = $user['Department'];
                  $_SESSION['logged_in'] = true;
                  header('Location: home.php?state=done');
              }
              else
              {
                  unset($_SESSION['uid']);
                  unset($_SESSION['Name']);
                  unset($_SESSION['Email']);
                  unset($_SESSION['Password']);
                  unset($_SESSION['Department']);
                  $_SESSION['logged_in'] = false;

                  header('Location: index.php?state=notDone');
              }
          }

      }
  endif;

if (isset($_POST['logout'])):

    header('Location: logout.php');
endif;

  ?>
    <div id="wrapper">

        <div id="contents">
            <form id="signemp" method="post">

            <img id="char" src="img/programer.jpg " />

                <div class="container" >
                <h2>Sign In </h2>
                <label for="uname"><b>Username</b></label><br>
                <input type="text" placeholder="Enter Username" name="uid" required> <br>

                <label for="psw"><b>Password</b></label><br>
                <input type="password" placeholder="Enter Password" name="password" required><br>

                <button type="submit" name="login">Login</button>
                <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
                </label><br>
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>

                    </div>
                </form>
        </div>
    </div>

            <?php include'footer.php';?>
            
        
       
     
        
        
