<?php

ini_set('memory_limit', '120M');
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
//setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

//define("PROFILE", $_GET["profile"]);
define("PROFILE", "rodrigo");
define("BASE_PATH", "/rodrigo");
define("TEMA_PATH", BASE_PATH . "/theme");