<html>
<head><title>Erreur</title>
</head>
<body>
    <div style="height: 97%; width: 99%; border-color: #ffc107; border-style: dashed; border-width: 10px;">
        <div style="background-color: #ffc107; display: flex; justify-content: center; align-items: center; margin: 3em; margin-left: 10em; margin-right: 10em;">
            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="250" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>

            <h1>Aïe... une erreur est survenue !</h1>
        </div>

        <div style="background-color: black; display: flex; justify-content: center; align-items: center; margin: 3em; margin-left: 10em; margin-right: 10em;">
            <h3 style="color: white;">Voici le message d'erreur :
                <?php
                if (isset($VueErreur)) {
                    foreach ($VueErreur as $value){ //$VueErreur=array() a initialiser dans un controleur
                        echo $value;
                    }
                }
                ?>
            </h3>
        </div>
    </div>
</body> </html>