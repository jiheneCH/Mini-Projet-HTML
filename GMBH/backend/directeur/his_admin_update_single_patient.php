<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_patient']))
		{
            $code_équipement = $_GET['code_équipement'];
			$nom=$_POST['nom'];
			$marque=$_POST['marque'];
			$service=$_POST['service'];
            $date_service=$_POST['date_service'];
            //sql to insert captured values
			$query="UPDATE  his_patients  SET nom=?, marque=?, service=?, date_service=? WHERE code_équipement = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssss', $nom, $marque, $service, $date_service, $code_équipement);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Patient Details Updated";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>
<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html lang="en">
    
    <!--Head-->
    <?php include('assets/inc/head.php');?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include("assets/inc/nav.php");?>
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
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Equipements</a></li>
                                            <li class="breadcrumb-item active">Gérer les équipements</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Modifier les détails de l'équipement</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
                        <?php
                            $code_équipement=$_GET['code_équipement'];
                            $ret="SELECT  * FROM his_patients WHERE code_équipement=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$code_équipement);
                            $stmt->execute() ;//ok
                            $res=$stmt->get_result();
                            //$cnt=1;
                            while($row=$res->fetch_object())
                            {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Veuillez remplir tout les champs</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Nom de l'équipement</label>
                                                    <input type="text" required="required" value="<?php echo $row->nom;?>" name="nom" class="form-control"id="inputEmail4"  placeholder="Nom de l'équipement">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Marque</label>
                                                    <input required="required" type="text" value="<?php echo $row->marque;?>" name="marque" class="form-control"  id="inputEmail4" placeholder="Marque de l'équipement">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Service</label>
                                                    <input type="text" required="required" value="<?php echo $row->service;?>" name="service" class="form-control" id="inputEmail4" >
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Date de mise en service</label>
                                                    <input required="required" type="date" value="<?php echo $row->date_service;?>" name="date_service" class="form-control"  id="inputPassword4" placeholder="Date de mise en service">
                                                </div>
                                           
                                            </div>
                                            <button type="submit" name="update_patient" class="ladda-button btn btn-success" data-style="expand-right">Enregistrer les modifications</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <?php  }?>
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

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>

        <!-- Buttons init js-->
        <script src="assets/js/pages/loading-btn.init.js"></script>
        
    </body>

</html>