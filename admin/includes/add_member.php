 <?php  include "../includes/config.php"; ?>
 <?php

if(isset($_POST['submit_reg']) && $_POST['randcheck'] == $_SESSION['rand']){
    $uname =  strtolower($_POST['username']);
    $uemail = strtolower($_POST['email']);
    $upass = strtolower($_POST['password']);
    if(!empty($uname) && !empty($uemail) && !empty($upass)){
         $query = "INSERT INTO member(member_name,mem_email,mem_pass) ";
        $query .="VALUES('{$uname}','{$uemail}','{$upass}' ) ";
        $register_query = mysqli_query($connection,$query);
        if(!$register_query){
            die('cannot connect' . mysqli_error($connection));
        }
        else{
            echo "<h6>Successfully Created</h6>";
			header('Location:members.php?source=add_member');
        }
    }
    else{
        echo "<h6>Sorry Failed</h6>";
		header('Location:members.php?source=add_member');
    }
}


?>
    
 
    <!-- Page Content -->
    
    
<section id="login">
    <div class="">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
               
                   <h3 style="text-align:center;padding-bottom:20px;">Register New Member</h3>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
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
                
                        <input type="submit" name="submit_reg" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                    <br>
                    <h4>IF you Already Have accrount please <a href="../login.php">login</a></h4>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


<footer>
            <div class="container-fluid">
                <div class="author_content bg_secondary">
                    <h5>&copy; 2018 Developed By  <a id="salam" href="portfolio.codeexposer.com">Abdus Salam</a></h5>
                </div>
            </div>
        </footer>