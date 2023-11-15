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
                $code_demande=$_GET['code_demande'];
                $ret="SELECT  * FROM his_vendor WHERE code_demande = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$code_demande);
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Les interventions</a></li>
                                                <li class="breadcrumb-item active">Gérer les interventions</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Demande numéro : <?php echo $row->code_demande;?></h4>
                                    </div>
                                </div>
                            </div>     
                            <!-- end page title --> 

                           
                            <div class="clearfix">
                                            <div class="float-left">
                                                <img src="assets/images/logo-cims2021.png" alt="" height="40">
                                            </div>
                                            <div class="float-right">
                                                <h3 class="m-0 d-print-none">Demande numéro : <?php echo $row->code_demande;?></h3>
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
                                                    <p class="m-b-10"><strong>Date de l'intervention : </strong><span class="float-right"><?php echo $row->date_intervention;?></span></p>
                                                    <p class="m-b-10"><strong>Nom de l'équipement : </strong> <span class="float-right"><?php echo $row->nom_équipement;?></span></p>
                                                    <p class="m-b-10"><strong>Code de l'équipement : </strong> <span class="float-right"><?php echo $row->code_eqp;?></span></p>
                                              
                                                    <p class="m-b-10"><strong>Degré d'urgence : </strong> <span class="float-right"><?php echo $row->urgence;?></span></p>

                                                </div>
                                            </div><!-- end col -->
                                            <div>
                                            <p class="m-b-10"><strong>Service : </strong> <span class="float-right"><?php echo $row->serv;?></span></p>
                                                    <p class="m-b-10"><strong>Type de maintenance : </strong> <span class="float-right"><?php echo $row->typeinter;?></span></p>
                                            <p><strong>Nom et prénom du demandeur : </strong><span class="float-right"><?php echo $row->nom_demandeur;?></span></p>
                                            <p><strong>Matricule du demandeur : </strong><span class="float-right"><?php echo $row->matr;?></span></p>
                                            <p><strong>Matricule du technicien intervenant : </strong><span class="float-right"><?php echo $row->num;?></span></p>
                                            <p><strong>Matricule du technicien intervenant: </strong><span class="float-right"><?php echo $row->nom;?></span></p>
                                                <p><strong>Description : </strong><span class="float-right"><?php echo $row->descr;?></span></p>
                                                <p><strong>Etat de la demande : </strong><span class="float-right"><?php echo $row->etat;?></span></p>
                </div>
                                        </div>
                                        <!-- end row -->
            
                                       
                                       
            
                                        <div class="mt-4 mb-1">
                                            <div class="text-right d-print-none">
                                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i>Archiver</a>
                                            </div>
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