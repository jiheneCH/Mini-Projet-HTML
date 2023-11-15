<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['add_vendor']))
		{
			
			$nomtech=$_POST['nomtech'];
            $matr=$_POST['matr'];
            $daterapport=$_POST['daterapport'];
            
            $code_eqp=$_POST['code_eqp'];
            $nom=$_POST['nom'];
            $services=$_POST['services'];
            $typeinter = $_POST['typeinter'];
            $typemaint = $_POST['typemaint'];
            $descp = $_POST['descp'];
            $date=$_POST['date'];
            //$doc_pwd=sha1(md5($_POST['doc_pwd']));
            
            //sql to insert captured values
			$query="INSERT INTO rapport ( nomtech , matr , daterapport ,  code_eqp, nom, services , typeinter , typemaint, descp , date) values(?,?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssssssss', $nomtech , $matr, $daterapport, $code_eqp, $nom , $services , $typeinter , $typemaint, $descp , $date);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Rapport envoyé";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Rapport</a></li>
                                            <li class="breadcrumb-item active">Rédiger mon rapport</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Rédiger mon rapport</h4>
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
                                           
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Nom et Prénom du technicien</label>
                                                    <input type="text" required="required" name="nomtech" class="form-control" id="inputEmail4" >
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Matricule du technicien</label>
                                                    <input type="text" required="required" name="matr" class="form-control" id="inputEmail4" >
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Nom de l'équipement</label>
                                                    <input required="required" type="text" name="nom" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Code de l'équipement</label>
                                                    <input required="required" type="text" name="code_eqp" class="form-control"  id="inputPassword4">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Date de l'intervention</label>
                                                    <input required="required" type="date" name="daterapport" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Date du rapport</label>
                                                    <input required="required" type="date" name="date" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Service</label>
                                                    <input required="required" type="text" name="services" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                                <div class="form-group">
                                                    <label for="inputAddress" class="col-form-label">Description de l'intervention</label>
                                                    <textarea  type="text" class="form-control" name="descp" id="editor"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Type de maintenance</label>
                                                    <select id="inputState" required="required" name="typemaint" class="form-control">
                                                        <option>Préventive</option>
                                                        <option>Corrective</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Nature de la maintenance</label>
                                                    <select id="inputState" required="required" name="typeinter" class="form-control">
                                                        <option>curative</option>
                                                        <option>Palliative</option>
                                                        <option>Conditionnelle</option>
                                                        <option>Systematique</option>
                                                        <option>Previsionnelle</option>
                                                    </select>
                                                </div>

                                            

                                               

                                            <button type="submit" name="add_vendor" class="btn btn-primary" data-style="expand-right">Envoyer mon rapport</button>

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