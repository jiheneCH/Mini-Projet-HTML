<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['add_vendor']))
		{
			
			$nom_demandeur=$_POST['nom_demandeur'];
			$nom_équipement=$_POST['nom_équipement'];
            $code_eqp=$_POST['code_eqp'];
            $matr=$_POST['matr'];
            $date_intervention=$_POST['date_intervention'];
            $descr = $_POST['descr'];
            $urgence = $_POST['urgence'];
            $typeinter = $_POST['typeinter'];
            $serv=$_POST['serv'];
            //$doc_pwd=sha1(md5($_POST['doc_pwd']));
            
            //sql to insert captured values
			$query="INSERT INTO his_vendor ( nom_demandeur , matr , nom_équipement , code_eqp, date_intervention, descr, urgence , typeinter , serv) values(?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssssss', $nom_demandeur , $matr, $nom_équipement, $code_eqp, $date_intervention, $descr, $urgence , $typeinter, $serv);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Demande envoyé";
			}
			else {
				$err = "Essayez de nouveau";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Demande d'intervention</a></li>
                                            <li class="breadcrumb-item active">Créer une demande d'interevntion</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Créer une demande d'interevntion</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Veuillez remplir tout les champs</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Nom et Prénom du demandeur</label>
                                                    <input type="text" required="required" name="nom_demandeur" class="form-control" id="inputEmail4" >
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Matricule du demandeur</label>
                                                    <input type="text" required="required" name="matr" class="form-control" id="inputEmail4" >
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Nom de l'équipement</label>
                                                    <input required="required" type="text" name="nom_équipement" class="form-control"  id="inputPassword4">
                                                </div>


                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Code de l'équipement</label>
                                                    <input required="required" type="text" name="code_eqp" class="form-control"  id="inputPassword4">
                                                </div>



                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Date de l'intervention</label>
                                                    <input required="required" type="date" name="date_intervention" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Service</label>
                                                    <input required="required" type="text" name="serv" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                                <div class="form-group">
                                                    <label for="inputAddress" class="col-form-label">Description de la panne</label>
                                                    <textarea  type="text" class="form-control" name="descr" id="editor"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Type de maintenance demandé</label>
                                                    <select id="inputState" required="required" name="typeinter" class="form-control">
                                                        <option>Préventive</option>
                                                        <option>Corrective</option>
                                                        
                                                    </select>
                                                   
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Précisez le degré d'urgence</label>
                                                    <select id="inputState" required="required" name="urgence" class="form-control">
                                                        <option>Pasurgent</option>
                                                        <option>Urgent</option>
                                                        <option>Trésurgent</option>
                                                    </select>
                                                </div>

                                            

                                               

                                            <button type="submit" name="add_vendor" class="btn btn-primary" data-style="expand-right">Envoyer la demande</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
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
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>

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