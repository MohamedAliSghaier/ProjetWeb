<?php
	include 'C:/xampp/htdocs/dorra/Controller/activiteC.php';
	$Activitec=new Activitec();
    $listeactivite=$Activitec->Affichera(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ZAYTUNA</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ZAYTUNA <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="afficherActivite.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Editer Activité</span></a>
        
</li>
<li class="nav-item active">
    <a class="nav-link" href="afficherParticip.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        
        <span>Editer Participation</span></a>
</li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Dorra Jemili</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                        </li>

                    </ul>

                </nav>
                <div class="col-lg-12 grid-margin stretch-card">
                 <div class="card">
                 <div class="card-body">
                 <h4 class="card-title">Listes Activité</h4>

                  <?php
                 if(isset($_GET['successMessage']))
                 {
                  $successMessage = $_GET['successMessage'];
              
                 echo "<div class='alert alert-warning alert-dismissible fade show' rol e='alert'>
                 '$successMessage'
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>"; 
                 }

		         if(isset($_GET['message'])){
                 $message = $_GET['message'];
              
                 echo "<div class='alert alert-warning alert-dismissible fade show' rol e='alert'>
                 '$message'
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                 </div>"; }

		         if(isset($_GET['mess'])){
                 $mess = $_GET['mess'];
              
                  echo "<div class='alert alert-warning alert-dismissible fade show' rol e='alert'>
                 '$mess'
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> 
                 </div>";}
                 ?>

                 <a class="btn btn-primary" href="ajouterActivite.php" role="button">Nouveau Activté</a>
                 <br>
                
                 <p></p>
    
                  <div class="table-responsive">
                  <table id="tableActivite" class="table">
		          <thead>
			          <tr>
                         <th>ID Activite</th>
				         <th>Titre </th>	
				         <th>Description </th>
                         <th>Categorie</th>
                         <th>Prix</th>
                         <th>Date</th>
				         <th>Modifier </th>
				         <th>Supprimer</th>
			         </tr>
		          </thead>
			        <?php
				      foreach($listeactivite as $Activite){
			        ?>
			       <tr>
	         		 <td><?php echo $Activite['id_a']; ?></td>
                     <td><?php echo $Activite['titre_a']; ?></td>
	      			 <td><?php echo $Activite['description_a']; ?></td>
                     <td><?php echo $Activite['categorie_a']; ?></td>
                     <td><?php echo $Activite['prix_a']; ?></td>
                     <td><?php echo $Activite['date_a']; ?></td>

				     <td>	
                     <form method="GET" action="modifierActivite.php">
					 <input type="submit"  class="btn btn-primary btn-sm" name="Modifier" value="Modifier">
					 <input type="hidden"  value=<?php echo $Activite['id_a']; ?>  name="id_a">  
					 </form>
				     </td>
				     <td>
					 <a  class="btn btn-danger btn-sm"   href="supprimerActivite.php?id_a=<?php echo $Activite['id_a']; ?>">Supprimer</a>
				     </td>
			       </tr>
			     <?php
				 }
			     ?>
		         </table>
               
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>