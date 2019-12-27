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
    echo "<br><a href=index.php?controller=user&action=update&login=" . rawurlencode($v->getLogin()) . '>' . 'MODIFIER' . '</a>'.'<br>';
?>