<?php
    echo 'Le jeu a bien été supprimé';
    $tab_jeu = ModelJeu::getJeuSansNonce(); 
    require_once File::build_path(array('view','jeu','list.php'));
?>