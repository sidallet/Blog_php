<!DOCTYPE html>
<html class="text-warning" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <section class="login-clean" >
        <form action="index.php?action=ajouterCommentaire&idNews=<?php echo $id ?>" method="post">
            <button class="btn btn-info" type="button" onclick="location.href='index.php'">Retour</button>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <div class="mb-3"><input class="form-control" type="text" name="pseudo" placeholder="Pseudo" value="<?php if(isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) echo $_SESSION['pseudo']; ?>"></div>
            <div class="mb-3"><input class="form-control" type="text" name="commentaire" placeholder="Commentaire"></div>
            <div class="mb-3"><button class="btn btn-info d-block w-100" type="submit">Valider</button></div>
        </form>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>