
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_pharmaceutical_category']))
		{
			$nom_équipement = $_GET['nom_équipement'];
            $dateinter = $_POST['dateinter'];
            $code_équipement=$_POST['code_équipement'];
            $serv=$_POST['serv'];
            $descr=$_POST['descr'];
            $typeinter=$_POST['typeinter'];
            $typemaint=$_POST['typemaint'];
            $technicien=$_POST['technicien'];
            $matricule=$_POST['matricule'];
            $fournisseur=$_POST['fournisseur'];
            //sql to update captured values
			$query="UPDATE intervention_externe SET dateinter=?  , code_équipement=?,  serv=? , descr=? , typeinter=? , typemaint=? , technicien=? , matricule=?, fournisseur=? WHERE nom_équipement= ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssssssss',   $dateinter, $code_équipement , $serv , $descr , $typeinter , $typemaint , $technicien , $matricule , $fournisseur , $nom_équipement);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Intervention modifiée ";
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
                $nom_équipement=$_GET['nom_équipement'];
                $ret="SELECT  * FROM intervention_externe WHERE nom_équipement=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$nom_équipement);
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Les interventions externes</a></li>
                                            <li class="breadcrumb-item active">Gérer les interventions externes</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Intervention externe</h4>
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
                                            <div class="form-row" >
                                                <div class="form-group col-md-6" style="display:none">
                                                    <label for="inputEmail4" class="col-form-label">Nom de l'équipement</label>
                                                    <input  type="text" value="<?php echo $row->nom_équipement;?>" required="required" name="nom_équipement" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword4" class="col-form-label">code de l'équipement</label>
                                                    <input required="required" value="<?php echo $row->code_équipement;?>" type="int" name="code_équipement" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword4" class="col-form-label">Date de l'intervention</label>
                                                    <input required="required" value="<?php echo $row->dateinter;?>" type="date" name="dateinter" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword4" class="col-form-label">Service</label>
                                                    <input required="required" value="<?php echo $row->serv;?>" type="text" name="serv" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword4" class="col-form-label">Nom et Prénom du technicien</label>
                                                    <input required="required" value="<?php echo $row->technicien;?>" type="text" name="technicien" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword4" class="col-form-label">Matricule du technicien</label>
                                                    <input required="required" value="<?php echo $row->matricule;?>" type="text" name="matricule" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword4" class="col-form-label">Nom de la société</label>
                                                    <input required="required" value="<?php echo $row->matricule;?>" type="text" name="fournisseur" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword4" class="col-form-label">Type d'intervention</label>
                                                    <input required="required" value="<?php echo $row->typeinter;?>" type="text" name="typeinter" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword4" class="col-form-label">Type  de maintenance</label>
                                                    <input required="required" value="<?php echo $row->typemaint;?>" type="text" name="typemaint" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Description de la tache exécutée</label>
                                                <textarea required="required" type="text" class="form-control" name="descr" id="editor"><?php echo $row->descr;?></textarea>
                                            </div>

                                           <button type="submit" name="update_pharmaceutical_category" class="ladda-button btn btn-danger" data-style="expand-right">Enregistrer les modifications</button>

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
                <?php }?>

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