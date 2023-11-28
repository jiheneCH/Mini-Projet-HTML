<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $doc_id = $_SESSION['ad_id'];
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
                
                $code = $_GET['code'];
                $ret="SELECT  * FROM rapport WHERE code = ?" ;
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$code);
                //$stmt->bind_param('i',$pres_id);
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
                                                <li class="breadcrumb-item"><a href="his_doc_dashboard.php">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Rapports</a></li>
                                                <li class="breadcrumb-item active">Voir les rapports</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">#<?php echo $row->code;?></h4>
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
                                                    <h2 class="mb-3">Code du rapport : <?php echo $row->code;?></h2>
                                                    <hr>
                                                    <h2 class="mb-3">Code de la demande : <?php echo $row->code_demande;?></h2>
                                                    <hr>
                                                    <h3 class="text-danger ">Date du rapport : <?php echo $row->date;?></h3>
                                                    <hr>
                                                    <hr>
                                                    <h3 class="text-danger">Nom du technicien : <?php echo $row->nomtech;?></h3>
                                                    <hr>
                                                    <h3 class="text-danger ">Matricule du technicien : <?php echo $row->matr;?></h3>
                                                    <hr>
                                                    <h3 class="text-danger ">Code de l'équipement : <?php echo $row->code_eqp;?></h3>
                                                    <hr>
                                                    <h3 class="text-danger ">Nom de l'équipement : <?php echo $row->nom;?></h3>
                                                    <hr>
                                                    <hr>
                                                    <h3 class="text-danger ">Service : <?php echo $row->services;?></h3>
                                                    <hr>
                                                    <hr>
                                                    <h3 class="text-danger ">Type de maintenance : <?php echo $row->typemaint;?></h3>
                                                    <hr>
                                                    <hr>
                                                    <h3 class="text-danger ">Type d'intervention : <?php echo $row->typeinter;?></h3>
                                                    <hr>
                                                    <hr>
                                                    <h3 class="text-danger ">Date de l'intervention : <?php echo $row->daterapport;?></h3>
                                                    <hr>
                                                    <h2 class="align-centre">Description:</h2>
                                                    <hr>
                                                    <p class="text-muted mb-4">
                                                        <?php echo $row->descp;?>
                                                    </p>
                                                    <hr>
                                                   <!--
                                                    <form class="form-inline mb-4">
                                                        <label class="my-1 mr-2" for="quantityinput">Quantity</label>
                                                        <select class="custom-select my-1 mr-sm-3" id="quantityinput">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                        </select>

                                                        <label class="my-1 mr-2" for="sizeinput">Size</label>
                                                        <select class="custom-select my-1 mr-sm-3" id="sizeinput">
                                                            <option selected>Small</option>
                                                            <option value="1">Medium</option>
                                                            <option value="2">Large</option>
                                                            <option value="3">X-large</option>
                                                        </select>
                                                    </form>

                                                    <div>
                                                        <button type="button" class="btn btn-danger mr-2"><i class="mdi mdi-heart-outline"></i></button>
                                                        <button type="button" class="btn btn-success waves-effect waves-light">
                                                            <span class="btn-label"><i class="mdi mdi-cart"></i></span>Add to cart
                                                        </button>
                                                    </div> -->
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <!--
                                        <div class="table-responsive mt-4">
                                            <table class="table table-bordered table-centered mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Outlets</th>
                                                        <th>Price</th>
                                                        <th>Stock</th>
                                                        <th>Revenue</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>ASOS Ridley Outlet - NYC</td>
                                                        <td>$139.58</td>
                                                        <td>
                                                            <div class="progress-w-percent mb-0">
                                                                <span class="progress-value">478 </span>
                                                                <div class="progress progress-sm">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 56%;" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$1,89,547</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Marco Outlet - SRT</td>
                                                        <td>$149.99</td>
                                                        <td>
                                                            <div class="progress-w-percent mb-0">
                                                                <span class="progress-value">73 </span>
                                                                <div class="progress progress-sm">
                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 16%;" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$87,245</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Chairtest Outlet - HY</td>
                                                        <td>$135.87</td>
                                                        <td>
                                                            <div class="progress-w-percent mb-0">
                                                                <span class="progress-value">781 </span>
                                                                <div class="progress progress-sm">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$5,87,478</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nworld Group - India</td>
                                                        <td>$159.89</td>
                                                        <td>
                                                            <div class="progress-w-percent mb-0">
                                                                <span class="progress-value">815 </span>
                                                                <div class="progress progress-sm">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$55,781</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> -->

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