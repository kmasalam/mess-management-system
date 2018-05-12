<?php

if(isset($_POST['addmeal']) && $_POST['fform'] == $_SESSION['fform'] ){

    $usrname = $_SESSION['member_name'];
    $mid = $_SESSION['mid'];
    $morning =  $_POST['morning'];
    $launch = $_POST['lunch'];
    $dinner = $_POST['dinner'];
    $mealdate = $_POST['todate'];
    
    $query = "INSERT INTO meal_table(member_name,meal_date,breakfast,launch,dinner,mid) ";
    $query .="VALUES('{$usrname}','{$mealdate}','{$morning}','{$launch}','{$dinner}','{$mid}') ";
    $connection_query = mysqli_query($connection,$query);
    if(!$connection_query){
        die('Connection Error' . mysqli_error($connection));
    }
    else{
        echo "<h3>Successful</h3>";
        
    }
    
}
else{

}




?>
<h1 class="page-header">
    Login as 
    <small><?php echo $_SESSION['member_name'];?></small>
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> Add Meal
    </li>
</ol>

<form method="post">
  <?php
   $rand=rand();
   $_SESSION['fform']=$rand;
  ?>
  <input type="hidden" value="<?php echo $rand; ?>" name="fform" />
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Morning</label>
    <div class="col-sm-10">
      <div class="form-group">
    
        <select class="form-control" name="morning" id="exampleFormControlSelect1">
          <option value="0">Meal Number</option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Launch</label>
    <div class="col-sm-10">
      <div class="form-group">
      
        <select class="form-control" name="lunch" id="exampleFormControlSelect2">
          <option value="0">Meal Number</option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Dinner</label>
    <div class="col-sm-10">
      <div class="form-group">
       
        <select class="form-control" name="dinner" id="exampleFormControlSelect3">
          <option value="0">Meal Number</option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Date</label>
    <div class="col-sm-10">
      <div class="form-group">
     
     <?php
          
          
          $list=array();
$month = 12;
$year = 2018;
$today = date("Y-m-d");
$totalDay = date('t');
$curm = date('m', strtotime('-1'));
$cury = date('Y', strtotime('-1'));
$curd = date('d', strtotime('-1'));
          
for($d=1; $d<=$totalDay; $d++)
{
    $time=mktime(12, 0, 0, $curm, $d, $cury);          
    if (date('m', $time)==$curm)       
        $list[]=date('Y-m-d', $time);
   
}     
          ?>
          
<select class="form-control" name="todate" > 
   <option value="<?php echo $today;?>">Select Date</option>
   <option value="<?php echo $today;?>">For Today</option>
    <?php foreach($list as $key => $value){ ?>
      
       <option value="<?php echo $value;?>"><?php echo $value;?></option>
    <?php } ?>
</select>

        
      </div>
    </div>
  </div>
  <div class="form-group row">
    
    <div class="col-sm-10 col-sm-offset-2">
      <button class="btn btn-primary" type="submit" name="addmeal">
          Submit
      </button>
    </div>
  </div>
  
</form>
<br>
<h3 style="background:#eee;padding-top:10px;padding-bottom:10px;padding-left:15px;">Person wise Expend</h3>
<br>
<br>

<?php


if(isset($_POST['addexpend']) && $_POST['randcheck']==$_SESSION['rand']){
    $usrname = $_SESSION['member_name'];
    $mid = $_SESSION['mid'];
    $netMoney = $_POST['netmoney'];
    $moneyDate =  $_POST['moneydate'];
    $query = "INSERT INTO mess_expense(member_name,expense_date,amount,mid) ";
    $query .="VALUES('{$usrname}','{$moneyDate}','{$netMoney}','{$mid}') ";
    $connection_query = mysqli_query($connection,$query);
    if(!$connection_query){
        die('connection failed' . mysqli_error($connection));
    }
    else{
        echo "<h3>Connection established</h3>";
        header('Location: meal.php?source=add_meal');
      }
}


?>
<form method="post">
  <?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
  <input type="hidden" value="<?php echo $rand;?>" name="randcheck" />
    <div class="form-group row">
    <label for="emoney" class="col-sm-2 col-form-label">Total Money</label>
    <div class="col-sm-10">
      <div class="form-group">
    
        <input type="text" class="form-control" placeholder="Money" name="netmoney">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="selectSubmit" class="col-sm-2 col-form-label">Select Date</label>
    <div class="col-sm-10">
      <div class="form-group">
       
        <select class="form-control" name="moneydate" id="selectSubmit">
         <option value="<?php echo $today;?>">Select Date</option>
               <option value="<?php echo $today;?>">For Today</option>
                <?php foreach($list as $key => $value){ ?>

                   <option value="<?php echo $value;?>"><?php echo $value;?></option>
                <?php } ?>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row">
    
    <div class="col-sm-10 col-sm-offset-2">
      <button class="btn btn-primary" type="submit" name="addexpend">
          Submit
      </button>
    </div>
  </div>
</form>