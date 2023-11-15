<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['add_vendor']))
		{
			
			$email=$_POST['email'];
            
			$body=$_POST['body'];
            $subject=$_POST['subject'];
            
            //$doc_pwd=sha1(md5($_POST['doc_pwd']));
            
            //sql to insert captured values
			$query="INSERT INTO commander_pièce ( email ,  body , subject ) values(?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sss', $email , $body, $subject);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Mail envoyé";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacter fournisseur</a></li>
                                            <li class="breadcrumb-item active">Commander pièce</li>
                                        </ol>
                                    </div>
                                    
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
                                        <form method="post" >
                                            <div class="form-row">
                                            
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Email de :</label>
                                                    <input type="text" required="required" name="from" class="form-control" id="inputEmail4" >
                                                </div>
                                               
    </div>
    <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Email à:</label>
                                                    <input type="text" required="required" name="email" class="form-control" id="inputEmail4" >
                                                </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Décision</label>
                                                    <select required="required" type="text" value="<?php echo $row->decision;?>" name="decision" class="form-control"  id="inputPassword4">
                                                        <option>Accepter</option>
                                                        <option>Refuser</option>
                                                       
                                                        </select>
                                                </div>
    </div>
                                                <div class="form-group">
                                                    <label for="inputAddress" class="col-form-label">Corps du mail :</label>
                                                    <textarea  type="text" class="form-control" name="body" id="editor"></textarea>
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