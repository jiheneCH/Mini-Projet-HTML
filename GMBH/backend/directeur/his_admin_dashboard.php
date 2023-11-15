<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>
<!DOCTYPE html>
<html lang="en">
    
    <!--Head Code-->
    <?php include("assets/inc/head.php");?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include('assets/inc/nav.php');?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('assets/inc/sidebar.php');?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                            
                        <!-- end page title --> 
                        

                    

                           
                        
                        
                        <div class="widget-rounded-circle card-box"  style="position: absolute; top: 70px; right: 540px; left : 400 px; ">
                       
                        
                        <h1  > Bienvenue  </h1>
                        </div>
                        <div class="widget-rounded-circle card-box"style="position: absolute; top: 170px;  ">
                        
                        <h4 > L'objectif de cette application est d'informatiser le processus de la maintenance biomédicale au sein des établissements de santé . <br> Et vous en etant le service biomédical au sein de cet hôpital cette application vous aidera à recevoir les demandes d'interventions des services , enregistrer les interventions internes et externes exécutées ,vous pouvez aussi ajouter ,voir et gérer le stock , les fournisseurs et les équipements et enfin planifier les interventions </br>de maintenance préventive.   </h4>

                         

                           

                        </div>
                        <!--Recently Employed Employees-->
                    <div class="row">
                        <div class="col-md-6 col-xl-4" style="position: absolute; top: 350px; right: 760px; left : 100 px; ">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                                <i class="mdi mdi-doctor font-22 avatar-title text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <?php
                                                    //code for summing up number of employees in the certain Hospital 
                                                    $result ="SELECT count(*) FROM his_docs ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($doc);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $doc;?></span></h3>
                                                <p class="text-muted mb-1 text-truncate">Les techniciens de l'hopital</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                             <!--Start Employees-->
                             
                             <div class="col-md-6 col-xl-4" style="position: absolute; top: 350px; right: 0px; left : 0 px; ">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                            <span class="mdi mdi-arrow-collapse-down font-22 avatar-title text-primary"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <?php
                                                    //code for summing up number of employees in the certain Hospital 
                                                    $result ="SELECT count(*) FROM his_vendor where etat='En attente daffectation' ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($doc);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $doc;?></span></h3>
                                                <p class="text-muted mb-1 text-truncate">Les demandes reçues</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                             <!--Start Employees-->


                            <div class="col-xl-12" style="position: absolute; top: 500px;" >
                                <div class="card-box">
                                    

                                    <div class="table-responsive">
                                        <div class="header-title mb-3"> 
                                        <h2  style="position: absolute; top: 0px; right: 790px; left : 10 px;  " >Suivi des interventions</h2></div>
                                    
                                        <table class="table table-borderless table-hover table-centered m-0">

                                            <thead class="thead-light">
                                                <tr>
                                                
                                                    <th>Code de la demande</th>
                                                    <th>Nom de l'équipement</th>
                                                    <th>Nom du technicien</th>
                                                    <th>Etape</th>
                                                    
                                                </tr>
                                            </thead>
                                            <?php
                                                $ret="SELECT * FROM his_vendor  ORDER BY code_demande desc"; 
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
                                                    
                                                    
                                                    <td>
                                                        <?php echo $row->code_demande;?> 
                                                    </td>    
                                                    <td>
                                                        <?php echo $row->nom_équipement;?> 
                                                    </td> 
                                                    <td>
                                                        <?php echo $row->nom;?> 
                                                    </td> 
                                                    <td>
                                                        <?php echo $row->etat;?>
                                                    </td>
                                                 
                                                    <td>
                                                        <a href="his_admin_view_single_vendor.php?code_demande=<?php echo $row->code_demande;?>" class="btn btn-xs btn-primary"><i class="mdi mdi-eye"></i> Voir</a>
                                                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                </tr>
                                            </tbody>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->                                                                                                                                                                                                                                         
                        </div>
                        <!-- end row -->
                        

                        
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

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0 text-white">Settings</h5>
            </div>
           

                

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>