<?php include "functions.php";?>
    <?php include "includes/admin_header.php";?>

    <div id="wrapper">

        <?php include"includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <?php
                        
                        if(isset($_GET['source'])){
                           $source =  $_GET['source'];

                        }
                        else{
                            $source = '';
                        }
                                switch ($source) {
                                case 'add_member':
                                    include "includes/add_member.php";
                                       
                                    break;
									
									case 'edit_member':
                                    include "includes/edit_member.php";
                                       
                                    break;
                                     
                                
                                default:
                                    include "includes/view_all_member.php";
                                    break;
                            }

                        
                        ?>
                        
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