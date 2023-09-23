<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>projetphp</title>
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md bg-secondary border-info border rounded-0 navigation-clean-search">
        <div class="container-fluid"><a class="title" href="index.php">NewsBlog</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mr-auto">
                    
                        
                    
                    <li class="nav-item">
                        <div class="newDivClass">
                            <a class="nav-link text-dark" href="index.php?action=accederAjouterNews">Ajouter</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="lightgreen" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                            </svg>
                        </div>
                    </li>
                    <li class="nav-item" <?php if(isset($_SESSION['login']) && !empty($_SESSION['login'])) {echo "style=\"display:none\"";} ?>>
                        <div class="newDivClass">
                            <a class="nav-link text-dark" href="index.php?action=afficherConnexion">Connexion</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                            </svg>
                        </div>
                    </li>
                    <li class="nav-item" <?php if(!isset($_SESSION['login']) && empty($_SESSION['login'])) {echo "style=\"display:none\"";} ?> >
                        <div class="newDivClass">
                            <a class="nav-link text-dark" href="index.php?action=decoAdmin">Deconnexion</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="newDivClass">
                            <a class="nav-link text-dark" href="index.php?action=fenetreAjouterAdmin">Créer un compte Admin</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="lightblue" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div style="background-color: #17a2b8; height: 50px; max-width: 300px; margin-right: 5px; border-radius: 4px; display: flex; align-items: center;">
                            <?php if(isset($_SESSION['login']) && !empty($_SESSION['login']))
                                    echo "Vous êtes connecté en tant qu'Admin, ".$_SESSION['login']." !";
                                  else
                                    echo "Vous n'êtes pas connecté."
                            ?>
                        </div>
                    </li>
                </ul>
                
                <form class="d-flex" method="post" action="index.php?action=rechercherNews">
                    <input class="form-control me-2" name="rechercheDate" type="date">
                    <button class="btn btn-info"   type="submit">Rechercher</button>
                </form>
            </div>
        </div>
        
        
           <p class="text-white bg-info p-2 rounded">Nombre de news du blog : <?php echo $nbNews;?></p>
           <p class="text-white bg-info p-2 rounded">Votre nombre de messages : <?php if(isset($_COOKIE['nbMessages'])) echo $_COOKIE['nbMessages']; else echo "indéfini"?></p>


    </nav>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>