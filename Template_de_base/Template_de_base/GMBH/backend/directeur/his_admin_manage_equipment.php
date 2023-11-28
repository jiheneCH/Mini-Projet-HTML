<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
  if(isset($_GET['id_fournisseur']))
  {
        $id_fournisseur=intval($_GET['id_fournisseur']);
        $adn="delete from his_equipments where id_fournisseur=?";
        $stmt= $mysqli->prepare($adn);
        $stmt->bind_param('i',$id_fournisseur);
        $stmt->execute();
        $stmt->close();	 
  
          if($stmt)
          {
            $success = "Equipment Deleted";
          }
            else
            {
                $err = "Try Again Later";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Les fournisseurs </a></li>
                                            <li class="breadcrumb-item active">Gérer les fournisseurs </li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Gérer les fournisseurs </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title"></h4>
                                    
                                    
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                
                                                <th data-hide="phone">Matricule fournisseur</th>
                                                <th data-hide="phone">Nom du fournisseur</th>
                                                <th data-hide="phone">Représentant</th>
                                                <th data-hide="phone">Email</th>
                                                <th data-hide="phone">Numéro de téléphone</th>
                                                
                                            </tr>
                                            </thead>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret="SELECT * FROM  his_equipments ORDER BY RAND() "; 
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                            ?>

                                                <tbody>
                                                <tr>
                                                    
                                                    <td><?php echo $row->id_fournisseur;?></td>
                                                    <td><?php echo $row->nom;?></td>
                                                    <td><?php echo $row->rep;?></td>
                                                    <td><?php echo $row->Email;?></td>
                                                    <td><?php echo $row->num;?></td>
                                                    
                                                    <td>
                                                        <a href="his_admin_view_single_eqp.php?id_fournisseur=<?php echo $row->id_fournisseur;?>" class="badge badge-success"><i class="far fa-eye "></i>Voir</a>
                                                        <a href="his_admin_update_single_eqp.php?id_fournisseur=<?php echo $row->id_fournisseur;?>" class="badge badge-warning"><i class="fas fa-clipboard-check "></i>Modifier</a>
                                                        <a href="his_admin_manage_equipment.php?id_fournisseur=<?php echo $row->id_fournisseur;?>" class="badge badge-danger"><i class="fas fa-trash-alt "></i>Supprimer</a>


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