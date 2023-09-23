<?php include('header.php'); ?>

<html>
<body>
        <button type="button" class="btn btn-dark m-3" onclick="location.href='index.php'">Retour</button>

        <?php
            foreach($listComm as $comm){
        ?>


        <div class="align-self-center" style="margin: 40px;">

            <p class="text-dark" style="font-size: 18px;"><?php echo $comm->getPseudo();?></p>


            <div class="row">
                <svg style="margin-right: 20px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                </svg>
                <p class="text-success" style="font-size: 18px; margin-right: 20px;"><?php echo $comm->getContenu();?></p>

            </div>
        </div>
    </body>
</html>

<?php
    }
?>
