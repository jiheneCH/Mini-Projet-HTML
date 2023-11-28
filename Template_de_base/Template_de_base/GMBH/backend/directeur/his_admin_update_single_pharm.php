
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_pharmaceutical']))
		{$id = $_GET['id'];
			$code_équipement = $_POST['code_équipement'];
			$nom_équipement = $_POST['nom_équipement'];
            $serviceinter = $_POST['serviceinter'];
            $typeinter = $_POST['typeinter'];
            $dateinter = $_POST['dateinter'];
            $matricule = $_POST['matricule'];
            $nom = $_POST['nom']; 
            //sql to insert captured values
			$query="UPDATE  his_pharmaceuticals SET code_équpement=? ,nom_équipement=?, serviceinter=?, typeinter=?, dateinter=? , matricule=? , nom=? WHERE id = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssssss',$code_équpement, $nom_équipement, $serviceinter, $typeinter, $dateinter  , $matricule , $nom , $id);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Modifications enregistrés";
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
            <?php
                $id= $_GET['id'];
                $ret="SELECT  * FROM his_pharmaceuticals WHERE id=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$id);
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Maintenance préventive</a></li>
                                                <li class="breadcrumb-item active">Gérer les interventions</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Modifier l'intervention numéro : <?php echo $row->id;?></h4>
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
                                                <div class="form-group col-md-6">
                                                        <label for="inputEmail4" class="col-form-label">Code de l'équipement</label>
                                                        <input type="int" required="required" value="<?php echo $row->code_équipement;?>" name="code_équipement" class="form-control" id="inputEmail4" >
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4" class="col-form-label">Nom de l'équipement</label>
                                                        <input type="text" required="required" value="<?php echo $row->nom_équipement;?>" name="nom_équipement" class="form-control" id="inputEmail4" >
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label">Service</label>
                                                        <input required="required" type="text" value="<?php echo $row->serviceinter;?>" name="serviceinter" class="form-control"  id="inputPassword4">
                                                    </div>
                                                
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label">Matricule du technicien </label>
                                                        <input required="required" type="text" value="<?php echo $row->matricule;?>" name="matricule" class="form-control"  id="inputPassword4">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label">Nom et prénom du technicien</label>
                                                        <input required="required" type="text" value="<?php echo $row->nom;?>" name="nom" class="form-control"  id="inputPassword4">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label">Date</label>
                                                        <input required="required" type="date" value="<?php echo $row->dateinter;?>" name="dateinter" class="form-control"  id="inputPassword4">
                                                    </div>
                                               
                                                    <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Type de maintenance demandée</label>
                                                    <select id="inputState" required="required" name="typeinter" class="form-control">
                                                        <option>Conditionnelle</option>
                                                        <option>Systematique</option>
                                                        <option>Previsionnelle</option>
                                                        
                                                    </select>
                                                </div>
                                                
                                                
                                                

                                                    
                                                    
                                                </div>
                                            <button type="submit" name="update_pharmaceutical" class="ladda-button btn btn-warning" data-style="expand-right">Enregistrer les modifications</button>

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
            <?php }?>
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