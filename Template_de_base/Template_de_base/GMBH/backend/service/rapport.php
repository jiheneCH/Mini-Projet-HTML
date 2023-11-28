<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $ad_id = $_SESSION['ad_id'];
?>


<!DOCTYPE html>
<html lang="en">
    <?php include('assets/inc/head.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include("assets/inc/nav.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                <?php include ('assets/inc/sidebar.php');?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php
                $code = $_GET['code'];
                $ret="SELECT  * FROM rapport WHERE code= ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$code);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                $cnt=1;
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Les rapports</a></li>
                                                <li class="breadcrumb-item active">Voir les rapports</li>
                                            </ol>
                                        </div>
                                        <h2 class="page-title">Rapport</h2>
                                    </div>
                                </div>
                            </div>     
                            <!-- end page title --> 

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <!-- Logo & title -->
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <img src="assets/images/logo-cims2021.png" alt="" height="40">
                                            </div>
                                            <div class="float-right">
                                                <h3 class="m-0 d-print-none">Rapport numéro<?php echo $row->code;?></h3>
                                            </div>
                                        </div>
            
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mt-3">
                                                    <p><b></b></p>
                                                    <p class="text-muted"></p>
                                                </div>
            
                                            </div><!-- end col -->
                                            <div class="col-md-4 offset-md-2">
                                                <div class="mt-3 float-right">
                                                    <p class="m-b-10"><strong>Date du rapport : </strong><span class="float-right"><?php echo $row->date;?></span></p>
                                                    <p class="m-b-10"><strong>Nom de l'équipement : </strong> <span class="float-right"><?php echo $row->nom;?></span></p>
                                                    <p class="m-b-10"><strong>Code de l'équipement : </strong> <span class="float-right"><?php echo $row->code_eqp;?></span></p>
                                                    <p class="m-b-10"><strong>Nom du technicien : </strong> <span class="float-right"><?php echo $row->nomtech;?></span></p>
                                                    <p class="m-b-10"><strong>Matricule du technicien  : </strong> <span class="float-right"><?php echo $row->matr;?></span></p>

                                                </div>
                                            </div><!-- end col -->
                                            <div>
                                            <p><strong>Service : </strong><span class="float-right"><?php echo $row->services;?></span></p>
                                            <p><strong>Type de maintenance : </strong><span class="float-right"><?php echo $row->typemaint;?></span></p>
                                            <p><strong>Type d'intervention : </strong><span class="float-right"><?php echo $row->typeinter;?></span></p>
                                            <p><strong>Date de l'intervention : </strong><span class="float-right"><?php echo $row->daterapport;?></span></p>
                                                <p><strong>Description : </strong><span class="float-right"><?php echo $row->descp;?></span></p>
                                                <p><strong>Décision du service concerné : </strong><span class="float-right"><?php echo $row->decision;?></span></p>
                </div>
                                        </div>
                                        <!-- end row -->
            
                                       
                                       
            
                                        <div class="mt-4 mb-1">
                                            <div class="text-right d-print-none">
                                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i>Archiver</a>
                                            </div>
                                        </div>
                                    </div> <!-- end card-box -->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row --> 
                            
                        </div> <!-- container -->

                    </div> <!-- content -->

                    <!-- Footer Start -->
                        <?php include ("assets/inc/footer.php");?>
                    <!-- end Footer -->

                </div>
            <?php $cnt =  $cnt + 1 ; }?>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>