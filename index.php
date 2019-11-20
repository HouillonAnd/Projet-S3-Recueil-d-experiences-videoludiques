<?php
// $ROOT_FOLDER = __DIR__;
// $DS = DIRECTORY_SEPARATOR;
session_start();
require_once __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "File.php";
require_once File::build_path(array('controller','routeur.php'));
?>	