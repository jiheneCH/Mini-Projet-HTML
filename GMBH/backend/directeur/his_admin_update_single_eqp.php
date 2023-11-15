
<?php
	session_start();
	include('assets/inc/config.php');
        if(isset($_POST['update_equipments']))
        
        {
        
		    $id_fournisseur = $_GET['id_fournisseur'];
			$nom = $_POST['nom'];
            $rep= $_POST['rep'];
            $Email = $_POST['Email'];
            $num = $_POST['num'];
            $adresse = $_POST['adresse'];
                
            //sql to insert captured values
			$query="UPDATE  his_equipments SET  nom = ?, rep=? ,Email = ?, num = ? , adresse=? WHERE id_fournisseur = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssss',  $nom, $rep ,$Email, $num , $adresse , $id_fournisseur);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Informations modifiéss";
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
                $id_fournisseur=$_GET['id_fournisseur'];
                $ret="SELECT  * FROM his_equipments WHERE id_fournisseur=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$id_fournisseur);
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Gérer les fournisseurs</a></li>
                                                <li class="breadcrumb-item active"> Modifier</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Modifier les détails d'un fournisseur</h4>
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
                                                        <label for="inputEmail4" class="col-form-label">Nom du fournisseur</label>
                                                        <input type="text" required="required" value="<?php echo $row->nom;?>" name="nom" class="form-control" id="inputEmail4" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="col-form-label">Représentant</label>
                                                        <input type="text" required="required" value="<?php echo $row->rep;?>" name="rep" class="form-control" id="inputEmail4" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputPassword4" class="col-form-label">Email</label>
                                                        <input required="required" type="text" value="<?php echo $row->Email;?>" name="Email" class="form-control"  id="inputPassword4">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputPassword4" class="col-form-label">Numéro de téléphone </label>
                                                        <input required="required" type="text" value = "<?php echo $row->num;?>" name="num" class="form-control"  id="inputPassword4">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputPassword4" class="col-form-label">Adresse </label>
                                                        <input required="required" type="text" value = "<?php echo $row->adresse;?>" name="adresse" class="form-control"  id="inputPassword4">
                                                    </div>
                                                    
                                                    
                                                </div>

                                                

                                               

                                            <button type="submit" name="update_equipments" class="ladda-button btn btn-success" data-style="expand-right">Enregistrer les modifications</button>

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