<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>
<!DOCTYPE html>
<html lang="en">
    
<?php include ('assets/inc/head.php');?>

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
            <?php
                $id_fournisseur=$_GET['id_fournisseur'];
                $ret="SELECT  * FROM his_equipments WHERE id_fournisseur= ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$id_fournisseur);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
                {
            ?>

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
                                                <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Les fournisseurs</a></li>
                                                <li class="breadcrumb-item active">Gérer les fournisseurs</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Détails du fournisseur <?php echo $row->nom;?> </h4>
                                    </div>
                                </div>
                            </div>     
                            <!-- end page title --> 

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                           
                                            <div class="col-xl-7">
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                    <h2 class="mb-3">Nom du fournisseur :<?php echo $row->nom;?></h2>
                                                    <hr>
                                                    <h2 class="mb-3">Représentant :<?php echo $row->rep;?></h2>
                                                    <hr>
                                                    <h4 class="text-danger">Email :<?php echo $row->Email;?></h4>
                                                    <hr>
                                                    <h4 class="text-danger">Numéro de téléphone : <?php echo $row->num;?></h4>
                                                    <hr>
                                                    <h4 class="text-danger"> Adresse : <?php echo $row->adresse;?></h4>
                                                  
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        

                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div>
                            <!-- end row-->
                            
                        </div> <!-- container -->

                    </div> <!-- content -->

                    <!-- Footer Start -->
                        <?php include('assets/inc/footer.php');?>
                    <!-- end Footer -->

                </div>
            <?php }?>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>