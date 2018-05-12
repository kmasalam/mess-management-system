<?php  include "includes/config.php"; ?>
<?php session_start();?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
    <?php

if(isset($_POST['submit_reg']) && $_POST['randcheck']==$_SESSION['rand']){
    $uname =  strtolower($_POST['username']);
    $uemail = strtolower($_POST['email']);
    $upass = strtolower($_POST['password']);

    
    if(!empty($uname) && !empty($uemail) && !empty($upass)){
		$uname = mysqli_real_escape_string($connection,$uname);
    	$uemail = mysqli_real_escape_string($connection,$uemail);
    	$upass = mysqli_real_escape_string($connection,$upass);
        
    	 $upass = password_hash($upass, PASSWORD_BCRYPT, array('cost'=>10));

         $query = "INSERT INTO member(member_name,mem_email,mem_pass) ";
        $query .="VALUES('{$uname}','{$uemail}','{$upass}' ) ";
        $register_query = mysqli_query($connection,$query);
        if(!$register_query){
            die('cannot connect' . mysqli_error($connection));
        }
        else{
            echo "<h3>Connect Successfully</h3>";
        }
    }
    else{
        echo "<h2>Everything is not okay</h2>";
    }
}
else{

}





?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="index.php" method="post" id="login-form" autocomplete="off">
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
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit_reg" id="btn-login" class="btn btn-custom btn-lg btn-primary btn-block" value="Register">
                    </form>
                    <br>
                    <h4>IF you Already Have accrount please <a href="login.php">login</a></h4>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
</section>


        <hr>



<?php include "includes/footer.php";?>
