<br>
<br>
    <table class="table table-bordered table-hover">

    <thead>
       <tr>
            <th>ID</th>
        <th>
            Date
        </th>
        <th>
            Member
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
        <?php
                                if(isset($_SESSION['mem_role'])){
                                    $mem_role = $_SESSION['mem_role'];
                                    if($mem_role == 'admin'){
                                        ?>
                                        
                                        <th>
                                            Edit
                                        </th>
                                        
                                        <?php
                                    }
                                }
                            ?>
       </tr>
    </thead>


    <tbody>
        <?php
        $first_day = date('Y-m-01'); 
        $last_day  = date('Y-m-t');
 
        $query = "SELECT * FROM meal_table WHERE meal_date >= '{$first_day}' AND meal_date <= '{$last_day}'";
        $select_query = mysqli_query($connection,$query);
        while($row= mysqli_fetch_assoc($select_query)){
            $post_id = $row['id']; 
            $post_name = $row['member_name']; 
            $post_date = $row['meal_date']; 
            $post_breakfast = $row['breakfast']; 
            $post_launch = $row['launch']; 
            $post_breakfast = $row['breakfast']; 
            $post_dinner = $row['dinner']; 
            $post_mid = $row['mid'];
       
            echo "<tr>";
            echo "<td>$post_id</td>";
            echo "<td>$post_date</td>";
            echo "<td>$post_name</td>";
            echo "<td>$post_breakfast</td>";
            echo "<td>$post_launch</td>";
            echo "<td>$post_dinner</td>";
             if(isset($_SESSION['mem_role'])){
                                    $mem_role = $_SESSION['mem_role'];
                                    if($mem_role == 'admin'){
                                        ?>
                                        
                                      <td><a href='meal.php?source=edit_meal&mem_id=<?php echo $post_mid;?>&meal_dt=<?php echo $post_date;?>'>Edit</a></td>
                                        
                                        <?php
                                    }
                                }
           
            echo "</tr>";
        }
        
        ?>
    </tbody>
    
</table>
<footer>
            <div class="container-fluid">
                <div class="author_content bg_secondary">
                    <h5>&copy; 2018 Developed By  <a id="salam" href="portfolio.codeexposer.com">Abdus Salam</a></h5>
                </div>
            </div>
        </footer>
