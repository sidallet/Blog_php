

<?php require('header.php'); ?>

    <button type="button" class="btn btn-dark m-2" <?php if($_SESSION['isInAffichageRecherche'] == false || !isset($_SESSION['isInAffichageRecherche'])) {echo "style=\"display:none\"";} ?> onclick="location.href='index.php';">
        Quitter la recherche
    </button>

<?php
    if(isset($listNews))
    {
        foreach($listNews as $news){
    
?>
          
    <div class="w-100 bg-secondary border rounded border-primary shadow-sm" style="margin: 15px;">
        <div class="container">
            <div class="row">

                <div class="DivWithPaddingR">
                    <p class="text-white" style="font-size: 18px;"><i class="fa fa-calendar-times-o"></i><?php echo $news->getDate();?> </p>
                    <div class="row" <?php if(!isset($_SESSION['login']) && empty($_SESSION['login'])) {echo "style=\"display:none\"";} ?>>
                            <a class="nav-link text-dark" href="index.php?action=supprimerNews&idNews=<?php echo $news->getIdNews();?>">Effacer&nbsp;</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-dash-circle-fill" viewBox="0 0 16 16" style="margin-top: 8px;">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                            </svg>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $news->getTitre();?></h4>
                            <p class="card-text"><?php  $text = strip_tags($news->getContenu());
                                                    // BBcode array
                                                    $find = array(
                                                        '~\[b\](.*?)\[/b\]~s',
                                                        '~\[i\](.*?)\[/i\]~s',
                                                        '~\[u\](.*?)\[/u\]~s',
                                                        '~\[quote\]([^"><]*?)\[/quote\]~s',
                                                        '~\[size=([^"><]*?)\](.*?)\[/size\]~s',
                                                        '~\[color=([^"><]*?)\](.*?)\[/color\]~s',
                                                        '~\[url\]((?:ftp|https?)://[^"><]*?)\[/url\]~s',
                                                        '~\[img\](https?://[^"><]*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s'
                                                    );
                                                    // HTML tags to replace BBcode
                                                    $replace = array(
                                                        '<b>$1</b>',
                                                        '<i>$1</i>',
                                                        '<span style="text-decoration:underline;">$1</span>',
                                                        '<pre>$1</'.'pre>',
                                                        '<span style="font-size:$1px;">$2</span>',
                                                        '<span style="color:$1;">$2</span>',
                                                        '<a href="$1">$1</a>',
                                                        '<img src="$1" alt="" />'
                                                    );
                                                    echo $text = preg_replace($find, $replace, $text);

                                                ?></p>
                        </div>

                    </div>

                </div>

                

                <button class="btn btn-info" onclick="location.href='index.php?action=fenetreListeCommentaire&idNews=<?php echo $news->getIdNews();?>';">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                    </svg>
                    Commentaires
                </button>
                <button onclick="location.href='index.php?action=fenetreCommentaire&idNews=<?php echo $news->getIdNews();?>';" class="alert-dark" style="margin-left: 8px; border-radius: 4px;" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                    </svg>
                    Ajouter un commentaire
                </button>

                


            </div>
        </div>
    </div>


<?php
        }
    } else echo "Aucune news";
    //Fin de la boucle
?>

<?php include('footer.php'); ?>

