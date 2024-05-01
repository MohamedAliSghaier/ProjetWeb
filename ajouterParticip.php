<?php
include_once 'C:/xampp/htdocs/dorra/Controller/activiteC.php';
include_once 'C:/xampp/htdocs/dorra/controller/participC.php';
$ActiviteC = new ActiviteC();
$listeActivite = $ActiviteC->Affichera();
$ParticipC = new ParticipC();
$listeParticip = $ParticipC->Afficherp(); 
$errorMessage = "";
$successMessage = "";
$Particip = null;
$str = rand();
$id_p = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST["statut"]) &&
    isset($_POST["activite"])
) {
    if (!empty($_POST["statut"])  && !empty($_POST["activite"])) {
        $activiteTitre = $_POST["activite"];
        $id_activite = $ActiviteC->getIdByType($activiteTitre); 

        $Particip = new Particip(
            $id_p,
            $_POST["statut"],
            $id_activite
        );
        $ParticipC->Ajouterp($Particip,$id_activite);
        header("Location: afficherParticip.php?successMessage=Participation ajouté avec succès");
        exit();
    }
    } else {
      
        echo "Une erreur s'est produite lors de l'ajout du Participation.";
}}
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
                <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">

        
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Nouveau Participation</h4>
                  
                  <form method="post" class="form" id="form"  >
                 
             
            <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label ">Id Participation</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_p" id="id_p"  value="<?php echo $id_p; ?>">
                   <a id="test3"></a>
                </div>
            </div>
            <br>

            
            <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label ">Statut Participation</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="statut" id="statut" placeholder= "Statut Participation">
                    <a id="test1"></a>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label "> Activite</label>
                <div class="col-sm-6">
                    <select class="form-control" name="activite" id="activite" >
                    <?php
            foreach ($listeActivite as $Activite) {
                echo "<option value='" . $Activite['titre_a'] . "'>" . $Activite['titre_a'] . "</option>";
            }
            ?>
        </select>
                </div>
            </div>
            </div>

            
              
            <!---------------------------------------------Buttons---------------------------------------------->
             <div class="row mb-5">
                 <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" name = "Ajouter"  id ="Ajouter">Ajouter</button>
             </div>
             <div class="col-sm-3 d-grid">
                 <a class="btn btn-primary" href="afficherParticip.php" role="button">Retour</a>
             </div>
          </div>
</div>

</form>
        <div id="messages"></div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form');
    const messagesDiv = document.getElementById('messages');

    function afficherMessage(input, message, reussi = false) {
        if (!reussi) {
            const messageElement = input.nextElementSibling;
            if (messageElement && messageElement.classList.contains('message')) {
                messageElement.textContent = message;
                messageElement.style.color = 'red';
            } else {
                const span = document.createElement('span');
                span.className = 'message';
                span.textContent = message;
                span.style.color = 'red';
                input.parentNode.insertBefore(span, input.nextElementSibling);
            }
        } else {
            const messageElement = input.nextElementSibling;
            if (messageElement && messageElement.classList.contains('message')) {
                messageElement.remove();
            }
        }
    }

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const titreValid = document.getElementById('statut').value;
        const actInputs = document.querySelectorAll('input[name="activite"]');

        messagesDiv.innerHTML = '';
        let isValid = true;
        
        if (!/^[a-zA-Z]+$/.test(titreValid)) {
            afficherMessage(document.getElementById('statut'), 'La statut ne doit contenir que des lettres');
            isValid = false;
        }
        if(isValid) {
            form.submit();
        }
    });
});

        </script>
               
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