<?php include "functions.php";?>
    <?php include "includes/admin_header.php";?>

    <div id="wrapper">

        <?php include"includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <br>
                        
                         <?php
                        
                        if(isset($_GET['source'])){
                           $source =  $_GET['source'];

                        }
                        else{
                            $source = '';
                        }
                                switch ($source) {
                                case 'edit_expenses':
                                    include "includes/edit_expenses.php";
                                       
                                    break;
                                     
                                
                                default:
                                    include "includes/view_all_expenses.php";
                                    break;
                            }

                        
                        ?>
                        
                    </div>
                </div>
                <!-- /.row -->

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