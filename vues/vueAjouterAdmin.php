<!DOCTYPE html>
<html class="text-warning" lang="en">

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
<div class="login-clean">
    <form method="post" action="index.php?action=ajouterAdmin">
        <button type="button" class="btn btn-outline-primary" onclick="location.href='index.php'">Retour</button>
        <h3 class="p-3">Ajout d'Admin</h3>
        <div class="p-2" style="display: flex; justify-content: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="lightblue" class="bi bi-person-plus" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </div>
        <div class="form-group"><input class="form-control" type="text" name="newLoginAdmin" placeholder="Votre nouveau login"></div>
        <div class="form-group"><input class="form-control" type="password" name="newPassword" placeholder="Votre mot de passe"></div>
        <div class="form-group"><input class="form-control" type="password" name="newPassword2" placeholder="Vérification du mot de passe"></div>
        <div class="form-group"><button type="submit" class="btn btn-info">Créer un compte Admin</button></div>
    </form>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
