<ul class="list-group justify-content-right">
    <?php
    foreach ($tab_v as $u) {
        $login = $u->getLogin();
        $email = $u->getEmail();
        echo "<li class=\"list-group-item\"><i class=\"far fa-user\"></i>$login</li>";
    }
    ?>
</ul>

<a href="#"></a>