<?php  include "includes/config.php"; ?>
<?php session_start();

$_SESSION['member_name'] = null;
$_SESSION['mem_email'] = null;
$_SESSION['mem_pass'] = null;
$_SESSION['mid'] = null;




?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
    <?php

if(isset($_POST['login']) && $_POST['randcheck'] == $_SESSION['rand']){
      $uname =  $_POST['username'];
      $upass = $_POST['password'];
       $_POST['randcheck'];
   $query = "SELECT * FROM member WHERE member_name = '{$uname}' ";
    $select_query = mysqli_query($connection,$query);
    if(!$select_query){
        die('connection problem' . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($select_query)){
        $member_name = $row['member_name'];
        $member_email = $row['mem_email'];
        $member_pass = $row['mem_pass'];
        $member_id = $row['mid'];
        $member_role = $row['mem_role'];
        if(password_verify($upass,$member_pass) && $uname === $member_name){
        $_SESSION['member_name'] = $member_name;
        $_SESSION['mem_email'] = $member_email;
        $_SESSION['mem_pass'] = $member_pass;
        $_SESSION['mid'] = $member_id;
        $_SESSION['mem_role'] = $member_role;
            header('Location: ./admin');
         
        }
        else{
            echo "<h3>Please Enter correct Password</h3>";
            //header("Location: login.php");
        }
    }
    
}





?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
			
                <div class="form-wrap">
                <h3 style="text-align:center;">Login</h3>
                   <br>
                    <form role="form" action="login.php" method="post" id="login-form" autocomplete="off">
					<?php
					$rand = rand();
					$_SESSION['rand'] = $rand;
					
					?>
					<input type="hidden" name="randcheck" value="<?php echo $rand;?>">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="login" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Login">
                    </form>
                  <br>
                    <h5 style="text-align:center;">IF you dont have account <a href="index.php">Register</a>First Already Have accrount please <a href="login.php">login</a></h5>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
