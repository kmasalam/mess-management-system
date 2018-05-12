<?php include "functions.php";?>
    <?php include "includes/admin_header.php";?>

    <div id="wrapper">

        <?php include"includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12" id="printarea">
                        
                        <br>
                        <br>
                        <button id="printbtn" style="float:right;">
                            Print
                        </button>
                       
<?php
if(isset($_POST['halfsubmit'])){
   $mealtype = $_POST['meltype'];
    $fromMonth = $_POST['fromMonth'];
   $toMonth = $_POST['toMonth'];
}

?>
<h2>Count Breakfast As a Half Meal</h2>
<br>
<form action="" method="post">
       <div class="row">
           <div class="col-md-3">
              <label>Select Breakfast Value</label>
               <select name="meltype" class="form-control">
      <option value="1">Select Meal</option>
       <option value=".5">Half Meal</option>
       <option value="1">Full Meal</option>
   </select>
           </div>
           <div class="col-md-3">
               <label>From</label>
              
               <input type="text" class="form-control datepicker"  placeholder="Check In" name="fromMonth">

           </div>
           <div class="col-md-3">
               <label>To</label>
               <input type="text" class="form-control datepicker"  placeholder="Check In" name="toMonth">
           </div>
           <div class="col-md-3">
              <div><label>Action</label></div>
               <button type="submit" class="btn btn-primary" name="halfsubmit">
               Apply
           </button>
           </div>
       </div>
       <br>
    <?php
    if(!empty($fromMonth) && !empty($fromMonth) && !empty($toMonth)){
     
        ?>
        <table class="table table-bordered ">
    <thead>
          <th>
              Name
          </th>
          <th>
              Morning
          </th>
          <th>
              Launch
          </th>
          <th>
              Dinner
          </th>
          <th>
              Total
          </th>
          <th>
              Total Expense
          </th>
      </thead>
      <tbody>
         <?php 
            
                $query = "SELECT * FROM `member`";
                $user  = mysqli_query($connection,$query);
                $useCount =mysqli_num_rows($user);
                while($mem = mysqli_fetch_assoc($user)){
                    
            
              ?>
          <tr>
              <td><?php echo $mem['member_name']?></td>
              <?php
                    
                 
                $meal = "SELECT SUM(`breakfast`) as brak, SUM(`launch`) as lunch,  SUM(`dinner`) as dinner FROM `meal_table`  WHERE `mid` = '".$mem['mid']."' AND meal_date >= '{$fromMonth}' AND meal_date <= '{$toMonth}'";
                    
                $tmeal = mysqli_query($connection,$meal);
                    
                    
                    while($me = mysqli_fetch_assoc($tmeal)){
                        if(!empty($mealtype)){
                           $rbreak = $me['brak']; 
                            $rbreak = $rbreak * $mealtype;
                        }
                        else{
                           $rbreak = $me['brak'];  
                        }
                        
                        $rlunch = $me['lunch'];
                        $rdinner = $me['dinner'];
                        @$tmorn+=$rbreak;
                        @$tlaun+=$rlunch;
                        @$tdin+=$rdinner;
                        @$all+= $rbreak+$me['lunch']+$me['dinner'];
              ?>
                  <td><?php echo $rbreak;?></td>
                  <td><?php echo $rlunch;?></td>
                  <td><?php echo $rdinner;?></td>
                  <td>
                    <?php echo $rbreak+$rlunch+$rdinner;?>
                   
             </td>
             <td>
                 <?php
                 $meal = "SELECT SUM(`amount`) as umoney FROM `mess_expense`  WHERE `mid` = '".$mem['mid']."' AND expense_date >= '{$fromMonth}' AND expense_date <= '{$toMonth}' ";
                $money  = mysqli_query($connection,$meal);
                $tmem = mysqli_fetch_assoc($money);
                        $memtotalc = $tmem['umoney'];
                        echo $tmem['umoney'];
                       
                 ?>
             </td>
              <?php }?>
          </tr>
          
          <?php }?>
            <tr>
             <th>
                 All
             </th>
              <th>
              <?php echo $tmorn?>
          </th>
          <th>
              <?php echo $tlaun?>
          </th>
                <th>
              <?php echo $tdin?>
          </th>
          <th>
              <?php echo $all;?>
          </th>
          <th>
              <?php
              
                 $meal = "SELECT SUM(`amount`) as umoney FROM `mess_expense` WHERE  expense_date >= '{$fromMonth}' AND expense_date <= '{$toMonth}' ";
                $money  = mysqli_query($connection,$meal);
                $tmem = mysqli_fetch_assoc($money);
                        $tmessexp = $tmem['umoney'];
              echo $tmessexp;
              
                 ?>
          </th>
          </tr>
      </tbody>
      <thead>
         
      </thead>
</table>


<table class="table table-bordered ">
   <thead>
       <tr>
           <th>
               Total Meal
           </th>
           <th>
               <?php echo $all;?>
           </th>
       </tr>
       <tr>
           <th>
               Total Member
           </th>
           <th>
                <?php echo $useCount;?>
           </th>
       </tr>
       <tr>
           <th>
               Meal Rate
           </th>
           <th>
              <?php
    
                    $ppMrate = $tmessexp /$all;
               
                echo $ppMrate;
               ?>
           </th>
       </tr>
   </thead>
</table>
<table class="table table-bordered ">
   <thead>
        <th>
        Member
    </th>
    <th>
        Member Expense
    </th>
    <th>
        Member Expense For Meal
    </th>
    <th>
        Result
    </th>
   </thead>
   <tbody>
       <?php
       $query = "SELECT * From member";
       $member_query = mysqli_query($connection,$query);
       while($row = mysqli_fetch_assoc($member_query)){
           
           ?>
           <tr>
          <td><?php echo $row['member_name'];?></td>
            <?php
          
                 $smeal = "SELECT SUM(`amount`) as umoney FROM `mess_expense`  WHERE `mid` = '".$row['mid']."' AND expense_date >= '{$fromMonth}' AND expense_date <= '{$toMonth}' ";
                $money  = mysqli_query($connection,$smeal);
                $tmem = mysqli_fetch_assoc($money);
                        $memtotalc = $tmem['umoney'];
                       $rm =  $tmem['umoney'];
                        echo "<td>$rm</td>";
          
                       
                 ?>
                 <?php
                $fromMonth;
                $toMonth;
              
                $meal = "SELECT SUM(`breakfast`) as brak, SUM(`launch`) as lunch,  SUM(`dinner`) as dinner FROM `meal_table`  WHERE `mid` = '".$row['mid']."' AND meal_date >= '{$fromMonth}' AND meal_date <= '{$toMonth}'";
                    
                $tmeal = mysqli_query($connection,$meal);
                    
                    
                   $me = mysqli_fetch_assoc($tmeal);
                        if(!empty($mealtype)){
                           $rbreak = $me['brak']; 
                            $rbreak = $rbreak * $mealtype;
                             $rbreak;
                        }
                        else{
                            $rbreak = $me['brak'];  
                        }
                        
                        $rlunch = $me['lunch'];
                        $rdinner = $me['dinner'];
                        @$tmorn+=$rbreak;
                        @$tlaun+=$rlunch;
                        @$tdin+=$rdinner;
                        @$all= $rbreak+$me['lunch']+$me['dinner'];
          
                        $exp_meal = $all * $ppMrate;
                    echo "<td>$exp_meal</td>";
           if($rm > $exp_meal){
               $tres = $rm - $exp_meal;
               
               echo "<th class='text-success'>$tres</th>";
           }
           else if($rm == $exp_meal){
              
           }
           else{
               $tres = $rm - $exp_meal;
             
               echo "<th class='text-danger'> $tres</th>";
           }
               
               ?>
          </tr>
        <?php  
       }
       ?>
   </tbody>
</table>
        
        <?php
}
    else{
}
    ?>
</form>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php";?>