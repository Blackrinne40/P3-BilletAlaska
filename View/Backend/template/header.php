<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Billet simple pour l'Alaska - Tableau de bord</title>

    <!--Bootstrap -->
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!--FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!--TinyMCE-->
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
      tinymce.init({
        selector: '#content',
      });
    </script>

	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light navbaradmin" id="nav">
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">
                <a class="blogTitle" href="index.php?action=dashboard">Tableau de bord</a>
            </span>
        </nav>
        <div class="collapse navbar-collapse head-navbar">
            <ul class="navbar-nav navbar-right mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?action=showPage&page=1" id="navHome">
                        <i class="fas fa-home fa-md"> </i> Accueil du blog
                    </a>
                </li>
                <li class ="nav-item">
                    <a class="nav-link btn btn-primary" href="index.php?action=disconnect" id="navConnect"><i class="btn-text-color">Déconnexion</i></a>
                </li>
            </ul>
        </div>
    </nav>

