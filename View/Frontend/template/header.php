

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Billet simple pour l'Alaska - par Jean Forteroche</title>

    
    <!--Bootstrap -->
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!--FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <!--TinyMCE-->
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
      tinymce.init({
        selector: '#message, #comment',
      });
    </script>

    <!--JQuery-->
    <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>

    <link rel="stylesheet"  type="text/css" href="./styles.css">

</head>
<body>
    <nav class="navbar navbar-light bg-light row" id="nav">
        <div class="navbar navbar-light bg-light col-lg-3 col-md-4  col-sm-4 col-xs-2">
            <span class="navbar-brand mb-0 h1">
                <a class="blogTitle" href="index.php?action=showPage&page=1">Billet simple pour l'Alaska</a>
            </span>
        </div>
        <nav class="col-lg-9 col-md-8 col-sm-8 ">

            <ul class="row justify-content-end col-lg-11 col-md-11 col-sm-11 ">
                <li class="nav-item active ">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                     <a class="nav-link" href="index.php?action=showPage&page=1" id="navHome"><i class="fas fa-home fa-md"></i>  Accueil</a>
                </li>
                <li class ="nav-item ">
                    <?php 
                    
                        if(isset($_SESSION['userLogged'])){ ?>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <a class="nav-link" href="index.php?action=dashboard" id="navdashboard">Tableau de Bord</a>

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <a class="nav-link" href="index.php?action=disconnect" id="navdisconnect">Déconnexion</a>
                   
                    <?php } 
                        else {?>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <a class="nav-link" href="index.php?action=connect" id="navConnect">Connexion</a>
                            
                    <?php } ?>
                </li>

            </ul>
        </nav>
    </nav>
<section>







