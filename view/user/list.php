<ul class="list-group justify-content-right">
    <?php
    foreach ($tab_v as $u) {
        $login = $u->getLogin();
        $email = $u->getEmail();
        $admin = $u->getAdmin();
        if(!Session::is_user( $login)){
            echo '
            <li class="list-group-item">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-1"><i class="far fa-user">'.htmlspecialchars($login).'</i></div>
                        <div class="col-1"><a href="index.php?controller=user&action=putAdmin&login='.htmlspecialchars($login).'">'.($admin?'<i class="fas fa-user-check"></i>':'<i class="fas fa-user-times"></i>').'</a></div>
                    </div>
                </div>
            </li>';
        }
    }
    ?>
</ul>