<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['doc_id'];
  if(isset($_GET['delete_vendor_number']))
  {
        $id=intval($_GET['delete_vendor_number']);
        $adn="delete from his_vendor where code_demande=?";
        $stmt= $mysqli->prepare($adn);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	 
  
          if($stmt)
          {
            $success = "Demande d'interventions supprimé ";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">les demandes d'interventions</a></li>
                                            <li class="breadcrumb-item active">Gérer les demandes</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Gérer les demandes</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title"></h4>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline" >
                                                <div class="form-group mr-2" style="display:none">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                        <option value="">Show all</option>
                                                        <option value="Discharged">Discharged</option>
                                                        <option value="OutPatients">OutPatients</option>
                                                        <option value="InPatients">InPatients</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                
                                                <th data-hide="phone">Code de la demande</th>
                                                <th data-hide="phone">Service</th>
                                                <th data-hide="phone">Nom de l'équipement</th>
                                                <th data-hide="phone">Type de maintenance</th>
                                                <th data-hide="phone">Date de l'intervention</th>
                                                <th data-hide="phone">Degrée d'urgence</th>
                                                <th data-hide="phone">Etat</th>
                                                <th data-hide="phone">Niveau</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret="SELECT * FROM  his_vendor ORDER BY code_demande desc "; 
                                                //sql code to get to ten docs  randomly
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                                    //$mysqlDateTime = $row->s_pat_date;
                                            ?>
                                           

                                                <tbody>
                                                <tr>
                                                    
                                                    <td><?php echo $row->code_demande;?></td>
                                                    <td><?php echo $row->serv;?></td>
                                                    <td><?php echo $row->nom_équipement;?></td>
                                                    <td><?php echo $row->typeinter;?></td>
                                                    <td><?php echo $row->date_intervention;?></td>
                                                    <td><?php echo $row->urgence;?></td>
                                                    <td><?php echo $row->etat;?></td>
                                                    <td><?php echo $row->decision;?></td>
                                                    <td>
                                                        <a href="his_admin_view_single_vendor.php?code_demande=<?php echo $row->code_demande;?>" class="badge badge-success"><i class="fas fa-eye"></i> Voir</a>
                                                        <a href="his_admin_update_single_vendor.php?code_demande=<?php echo $row->code_demande;?>" class="badge badge-success"><i class="fas fa-edit"></i> Affecter à</a>
                                                        <a href="his_admin_manage_vendor.php?delete_vendor_number=<?php echo $row->code_demande?>" class="badge badge-danger"><i class="fas fa-trash"></i> Supprimer</a>
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