<html lang="en">
<body>
    <div class="DivClassCentered">
        <?php
            for($i=1; $i<=$nbPages; $i++) {
                echo '<a class="page-link" href="index.php?action=afficher&page='.$i.'">'.$i.'</a> ';
            }
        ?>
    </div>
</body>
</html>