<?php
    foreach ($tab_post as $p){
    $id=$p->getId();
    echo '<p> Post d\'id ' . htmlspecialchars($id) . '<a href="http://webinfo.iutmontp.univ-montp2.fr/~agussolg/Projet-S3-Recueil-d-experiences-videoludiques/index.php?action=read&id='.rawurlencode($id).'""> Detail</a> </p> ';
    }
?>