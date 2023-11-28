<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
  if(isset($_GET['code']))
  {
        $code=intval($_GET['code']);
        $adn="DELETE FROM his_medical_records WHERE  code = ?";
        $stmt= $mysqli->prepare($adn);
        $stmt->bind_param('i',$code);
        $stmt->execute();
        $stmt->close();	 
  
          if($stmt)
          {
            $success = "Pièce supprimé";
          }
            else
            {
                $err = "Essayez de nouveau";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
    
<?php include('assets/inc/head.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
                <?php include('assets/inc/nav.php');?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                <?php include("assets/inc/sidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Stock</a></li>
                                            <li class="breadcrumb-item active">Gérer le stock</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Gérer le stock</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                        
                            <div class="col-12">
                            
                                <div class="card-box">
                                
                                <div class="form-group">
                                
                                                   
                                                
                                
                                    
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                
                                                <th data-toggle="true">Code de la pièce</th>
                                                <th data-hide="phone">Nom de la pièce</th>
                                                <th data-hide="phone">Marque</th>
                                                <th data-hide="phone">Prix</th>
                                                
                                            </tr>
                                            </thead>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */ 
                                                $ret="SELECT * FROM  his_medical_records ORDER BY RAND() "; 
                                                //sql code to get to ten docs  randomly
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                            ?>

                                                <tbody>
                                                <tr>
                                                   
                                                    <td><?php echo $row->code;?></td>
                                                    <td><?php echo $row->nom;?></td>
                                                    <td><?php echo $row->marque;?></td>
                                                    <td><?php echo $row->prix_unitaire;?> Dt</td>
                                                    
                                                    <td>
                                                        <a href="his_admin_view_single_medical_record.php?code=<?php echo $row->code;?>" class="badge badge-success"><i class="fas fa-eye"></i> Voir</a>
                                                        <a href="his_admin_upate_single_medical_record.php?code=<?php echo $row->code;?>" class="badge badge-warning"><i class="fas fa-eye-dropper "></i> Modifier</a>
                                                        <a href="his_admin_manage_medical_record.php?code=<?php echo $row->code;?>" class="badge badge-danger"><i class=" fas fa-trash-alt "></i>Supprimer</a>

                                                    </td>
                                                </tr>
                                                </tbody>
                                            <?php  $cnt = $cnt +1 ; }?>
                                            <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                 <?php include('assets/inc/footer.php');?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Footable js -->
        <script src="assets/libs/footable/footable.all.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/foo-tables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>