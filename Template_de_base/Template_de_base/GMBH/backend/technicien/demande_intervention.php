<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  //$aid=$_SESSION['ad_id'];
  $doc_id = $_SESSION['doc_id'];
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

           
                                    <?php
         // Vérifier si le formulaire est soumis 
                     if ( isset( $_POST['submit'] ) ) {
     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
             $code_demande = $_POST['code_demande']; 
             $service = $_POST['serv']; 
    
     // afficher le résultat
             echo '<h3>Informations récupérées en utilisant POST</h3>'; 
             echo 'code de la demande : ' . $code_demande. ' service: ' . $serv ; 
                  exit;
         }
            ?>
                                    
                                  
                        <
                 <?php include('assets/inc/footer.php');?>
               

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