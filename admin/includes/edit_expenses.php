<?php

if(isset($_GET['mem_id'])){
  $the_member = $_GET['mem_id'];
  $the_date = $_GET['ex_date'];
}
$query = "SELECT * FROM mess_expense WHERE mid='{$the_member}' AND expense_date='{$the_date}'";
$select_member = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_member)){
    $cexd = $row['expense_date'];
    $cam = $row['amount'];
}
if(isset($_POST['updateexp'])){
    $exam =  $_POST['exp_amount'];
    $exdt = $_POST['todate'];
  
    $query ="UPDATE mess_expense SET ";
    $query .="expense_date = '{$exdt }', ";
    $query .="amount = '{$exam }' ";
    $query .= "WHERE mid = {$the_member} ";
    
    $connection_query = mysqli_query($connection,$query);
    if(!$connection_query){
        die('connection failed' . mysqli_error($connection));
    }
    else{
        echo "<span>Updated</span>";
        }
    
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
        <i class="fa fa-file"></i> Blank Page
    </li>
</ol>

<form method="post">

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Amount</label>
    <div class="col-sm-10">
      <div class="form-group">
           <input type="text" value="<?php echo $cam;?>" placeholder="Amount" class="form-control" name="exp_amount">
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
   <option value="<?php echo $cexd;?>"><?php echo $cexd;?></option>
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
      <button class="btn btn-primary" type="submit" name="updateexp">
          Update
      </button>
    </div>
  </div>
  
</form>

