<?php 
session_start();
require("connexion.php");
$code=$_GET["code"];
$_SESSION['code']=$code;

    $req=$bdd->prepare("SELECT * FROM articles  where id_article=:code");
    $req->execute(array("code"=>$code));
    if($reponse=$req->fetch())
     {
        $id=$reponse["id_article"];
        $titre=$reponse["titre"];
        $lien=$reponse["lien"];
        $prix=$reponse["prix"];
    }
        
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HbbTV Sénégal: Ajout article</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">HBBTV Sénégal</a>
            </div>
            <!-- /.navbar-header -->

           <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['nom']; ?></a>
                        </li>
                        <li><a href="profil.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-film"></i> VOD <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="ajout.php"><i class="fa fa-edit fa-fw"></i>Ajouter</a>
                                </li>
                                <li>
                                    <a href="liste.php"><i class="fa fa-wrench fa-fw"></i>Modifier</a>
                                </li>
                                <li>
                                    <a href="liste.php"><i class="fa fa-times"></i>Supprimer</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart"></i><center> Vente en ligne </center><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="upload_img.php"><i class="fa fa-edit fa-fw"></i>Ajouter</a>
                                </li>
                                <li>
                                    <a href="liste_article.php"><i class="fa fa-wrench fa-fw"></i>Modifier</a>
                                </li>
                                <li>
                                    <a href="liste_article.php"><i class="fa fa-times"></i>Supprimer</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Vente en ligne</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

            <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Modifier un article
                        </div>
                        <div class="panel-body">

                <form action="modif_art.php" method="POST">
                          
                                        <div class="form-group">
                                            <!--<label>ID</label>-->
                                            <input type="hidden" name="id" value="<?php echo $id;?>"  class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Titre</label>
                                            <input type="text" name="titre" value="<?php echo $titre;?>"  class="form-control" required>
                                        </div>
                    
                                        
                                        <div class="form-group">
                                            <label>Prix</label>
                                            <input type="text" name="prix" value="<?php echo $prix;?>"  class="form-control" required>
                                        </div>
                                             
                                        <div align="center">
                                        <button type="submit" class="btn btn-outline btn-primary" onclick="return confirm('Voulez-vous vraiment supprimer!!!') ">Valider</button>
                                        <a href="liste_article.php"><button  class="btn btn-outline btn-warning"> Annuler  </button></a>
                                        </div>                                     
                </form>
            


<!--
                            <form method="POST" action="upload_image.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Titre</label>
                                    <input type="text" name="titre" class="form-control">
                                </div>
                                <label>Prix</label>
                                <div class="form-group input-group">
                                    <input type="number" name="prix" class="form-control">
                                    <span class="input-group-addon">Franc CFA</span>
                                </div>
                                <div>
                                    <label for="img">Votre image :</label><input type="file" name="img" id="image" /><br />
                                </div>
                                <div align="center">
                                    <input type="Submit" value="Envoyer" name="submit" />
                                    <input type="reset" value="Initialiser" />
                                </div>

                                </form>-->

                            
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                    
                        </div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
                </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
   <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
   

</body>

</html>
