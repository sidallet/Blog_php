<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>projetphp</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="contact-clean">
        <header></header>
        <form action="index.php?action=ajouterNews" method="post">
            <button type="button" class="btn btn-outline-primary" onclick="location.href='index.php'">Retour</button>
            <h2 class="text-center">Ajouter une news</h2><input class="form-control" type="date" name="date" style="margin: 0px 0px 15px ;">
            <div class="form-group"><input class="form-control" type="text" name="titre" placeholder="Titre"></div>
            <div class="form-group"><input class="form-control" type="text" name="contenu" placeholder="Contenu" rows="14"></input></div>
            <div class="form-group"><button type="submit" class="btn btn-primary">Valider</button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>


