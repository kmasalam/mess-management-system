<?php
    
    $memId =  $_SESSION['mid'];
    

?>
<h1 class="page-header">
    Login as 
    <small><?php echo $_SESSION['member_name'];?></small>
    <?php $today = date("Y-m-d");?>
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> My Meal
    </li>
</ol>

<form method="post">

  
  <table class="table table-bordered ">
      <thead>
          <th>
              Date
          </th>
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
          
      </thead>
      <tbody>
              <?php
    $first_day = date('Y-m-01'); 
    $last_day  = date('Y-m-t');
           $query3 = "SELECT * FROM meal_table WHERE meal_date >= '{$first_day}' and meal_date <= '{$last_day}' and mid=$memId";
                $all_select = mysqli_query($connection,$query3);
                $total_morning=0;
                $total_launch=0;
                $total_dinner=0;
                $total_day=0;
                $PTotal=0;
                $all= 0;
                while($nrow = mysqli_fetch_assoc($all_select)){
                    $pMor = $nrow['breakfast'];
                    $plau = $nrow['launch'];
                    $pdin = $nrow['dinner'];
                    $pdat = $nrow['meal_date'];
                    $pname = $nrow['member_name'];
                    $total_morning+= $pMor;
                    $total_launch+= $plau;
                    $total_dinner+= $pdin;
                    $PTotal = $pMor + $plau + $pdin;
                    $total_day+=1;
                    $all+= $PTotal;
                    
                    echo "<tr>";
                    echo "<td>$pdat</td>";
                    echo "<td>$pname</td>";
                    echo "<td>$pMor</td>";
                    echo "<td>$plau</td>";
                    echo "<td>$pdin</td>";
                    echo "<td>$PTotal</td>";
                    echo "</tr>";
                    
          
                }
          ?>
      </tbody>
      <thead>
          <thead>
              <tr>
                  <th>Total Day (<?php echo $total_day;?>)</th>
                  <th>
                      Of
                  </th>
                  <th>
                      <?php echo $total_morning;?>
                  </th>
                  <th>
                      <?php echo $total_launch;?>
                  </th>
                  <th>
                      <?php echo $total_dinner;?>
                  </th>
                  <th>
                      <?php echo $all;?>
                  </th>
              </tr>
          </thead>
      </thead>
  </table>
  
  
</form>


<footer>
            <div class="container-fluid">
                <div class="author_content bg_secondary">
                    <h5>&copy; 2018 Developed By  <a id="salam" href="portfolio.codeexposer.com">Abdus Salam</a></h5>
                </div>
            </div>
        </footer>