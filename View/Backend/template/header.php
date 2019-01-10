<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
	<nav class="navbar navbar-expand-lg navbar-light bg-light row" id="nav">
        <div class="navbar navbar-light bg-light col-lg-3 col-md-4  col-sm-4 col-xs-2">
            <span class="navbar-brand mb-0 h1">
                <a class="blogTitle" href="index.php?action=dashboard">Tableau de bord</a>
            </span>
        </div>
        <nav class="col-lg-9 col-md-8 col-sm-8 col-xs-10">
            <ul class="row justify-content-end  ">
                <li class="nav-item active ">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <a class="nav-link" href="index.php?action=showPage&page=1" id="navHome">
                        <i class="fas fa-home fa-md"> </i> Accueil du blog
                    </a>
                </li>
                <li class ="nav-item ">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <a class="nav-link " href="index.php?action=disconnect" id="navConnect">Déconnexion</a>
                </li>
            </ul>
        </nav>
    </nav>

