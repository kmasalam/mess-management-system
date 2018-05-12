<h3 style="text-align:center;padding-bottom:20px;">Member Expenses For Current Month</h3>
                           <table class="table table-bordered table-hover">
                            <thead>
                                <th>
                                    Member Name
                                </th>
                                <th>
                                    Member Id
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Date
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
                            </thead>
                            <tbody>
                                
                <?php
                 $first_day = date('Y-m-01'); 
                 $last_day  = date('Y-m-t');
                                
                $query = "SELECT * FROM mess_expense WHERE expense_date >= '{$first_day}' and expense_date <= '{$last_day}'";
                $expense_select = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($expense_select)){
                    $post_mid = $row['mid'];
                    $exdate = $row['expense_date'];
                    echo "<tr>";
                    echo "<td>".$row['member_name']."</td>";
                    echo "<td>".$row['mid']."</td>";
                    echo "<td>".$row['amount']."</td>";
                    echo "<td>".$row['expense_date']."</td>";
                    if(isset($_SESSION['mem_role'])){
                                    $mem_role = $_SESSION['mem_role'];
                                    if($mem_role == 'admin'){
                                        ?>
                                        
                                      <td><a href='expenses.php?source=edit_expenses&mem_id=<?php echo $post_mid;?>&ex_date=<?php echo $exdate;?>'>Edit</a></td>
                                        
                                        <?php
                                    }
                                }
                    
                    echo "</tr>";
                }
                ?>
                                
                            </tbody>
                        </table>