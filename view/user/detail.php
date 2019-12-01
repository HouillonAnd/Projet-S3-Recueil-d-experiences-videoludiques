<?php
    $login = $v->getLogin();
    // $bar = <<<EOT
    // <div>
    //     <p>NOM : $nom</p>
    //     <p>PRENOM : $prenom</p>
    //     <p>LOGIN : $login</p>
    // </div>
    // EOT;
    
    echo $login;
    echo "<br><a href=http://localhost/Projet-S3-Recueil-d-experiences-videoludiques/index.php?controller=user&action=update&id=" . rawurlencode($v->getId()) . '>' . 'MODIFIER' . '</a>'.'<br>';
?>