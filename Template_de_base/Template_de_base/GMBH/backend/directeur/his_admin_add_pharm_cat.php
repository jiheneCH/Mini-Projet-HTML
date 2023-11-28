
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['add_pharmaceutical_category']))
		{
			
			$dateinter = $_POST['dateinter'];
            $code_rapport = $_POST['code_rapport'];
			$nom_équipement=$_POST['nom_équipement'];
            $code_équipement=$_POST['code_équipement'];
            $serv=$_POST['serv'];
            $descr=$_POST['descr'];
            $typeinter=$_POST['typeinter'];
            $typemaint=$_POST['typemaint'];
            $technicien=$_POST['technicien'];
            $matricule=$_POST['matricule'];
            
            
            //sql to insert captured values
			$query="INSERT INTO his_pharmaceuticals_categories (dateinter , code_rapport , nom_équipement , code_équipement,  serv , descr , typeinter , typemaint , technicien , matricule) VALUES (?,?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssssssss', $dateinter ,$code_rapport, $nom_équipement, $code_équipement , $serv , $descr , $typeinter , $typemaint , $technicien , $matricule);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Intervention ajoutée";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Interventions</a></li>
                                            <li class="breadcrumb-item active">Ajouter une intervention</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Créer une intervention</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Veuillez remplir tous les champs</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Code du rapport</label>
                                                    <input type="text" required="required" name="code_rapport" class="form-control" id="inputEmail4" >
                                                </div>
                                              
                                            </div>

                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Code de l'équipement</label>
                                                    <input type="text" required="required" name="code_équipement" class="form-control" id="inputEmail4" >
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Nom de l'équipement</label>
                                                    <input type="text" required="required" name="nom_équipement" class="form-control" id="inputEmail4" >
                                                </div>

                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Date de l'intervention</label>
                                                    <input type="date" required="required" name="dateinter" class="form-control" id="inputEmail4" >
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Service</label>
                                                    <input type="text" required="required" name="serv" class="form-control" id="inputEmail4" >
                                                </div>

                                            </div>

                                           

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Nom et Prénom du technicien</label>
                                                    <input type="text" required="required" name="technicien" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Matricule du technicien</label>
                                                    <input type="text" required="required" name="matricule" class="form-control" id="inputEmail4" >
                                                </div>

                                            </div>

                                            


                                
                                            <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Type de maintenance demandée</label>
                                                    <select id="inputState" required="required" name="typeinter" class="form-control">
                                                        <option>Préventive</option>
                                                        <option>Corrective</option>
                                                        
                                                    </select>
                                                </div>
                                              
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Type de maintenance </label>
                                                    <select id="inputState" required="required" name="typemaint" class="form-control">
                                                        <option>Curative</option>
                                                        <option>Palliative</option>
                                                        <option>Conditionnelle</option>
                                                        <option>Systematique</option>
                                                        <option>Previsionnelle</option>
                                                    </select>
                                                </div>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Déscription de la tache exécutée</label>
                                                <textarea  type="text" class="form-control" name="descr" id="editor"></textarea>
                                            </div>
                                           <button type="submit" name="add_pharmaceutical_category" class="ladda-button btn btn-success" data-style="expand-right">Ajouter l'intervention</button>

                                        </form>
                                     
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
        <!--Load CK EDITOR Javascript-->
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>
       
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