<?php include "includes/admin_header.php";?>
<?php include"includes/admin_navigation.php";?>
    <div id="wrapper">
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Loged in as 
                           
                            <small><?php echo $_SESSION['member_name'];?></small>
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                       <h3 style="text-align:center;padding-bottom:20px;">Daily Meal Board</h3>
                       
                        <table class="table table-bordered table-hover">
            <thead>
                <th>
                    name
                </th>
                <th>
                    morning
                </th>
                <th>
                    launch
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
                $today = date("Y-m-d");
                $query = "SELECT * FROM meal_table WHERE meal_date='$today' ";
                $select_query = mysqli_query($connection,$query);
                $total_morning=0;
                $total_launch=0;
                $total_dinner=0;
                $all= 0;
                while($row = mysqli_fetch_assoc($select_query)){
                    $name= $row['member_name'];
                    $mMorning=  $row['breakfast'];
                    $mLaunch= $row['launch'];
                    $mDinner= $row['dinner'];
                    $PTotal = $mMorning + $mLaunch + $mDinner;
                    @$total_morning+= $mMorning;
                    @$total_launch+= $mLaunch;
                    @$total_dinner+= $mDinner;
                    @$all+= $PTotal;
                    
                    
                  
                  
                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$mMorning</td>";
                    echo "<td>$mLaunch</td>";
                    echo "<td>$mDinner</td>";
                    echo "<td>$PTotal</td>";
                    echo "</tr>";

                }
  
               

                ?>
            </tbody>
            <thead>
                <th>
                    Total
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
                    <?php echo @$all;?>
                </th>
            </thead>
        </table>
        
        
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
        <footer>
            <div class="container-fluid">
                <div class="author_content bg_secondary">
                    <h5>&copy; 2018 Developed By  <a id="salam" href="portfolio.codeexposer.com">Abdus Salam</a></h5>
                </div>
            </div>
        </footer>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php";?>