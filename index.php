<?php
require __DIR__ . "/Core/config.inc.php";
require __DIR__ . "/Core/function.inc.php";
require __DIR__ . "/Core/idioma.inc.php";

use Landim32\MyCareerProfile\BLL\CurriculoBLL;

$regraCurriculo = new CurriculoBLL();
$curriculo = $regraCurriculo->carregarJson(PROFILE . ".json", IDIOMA);

require __DIR__ . "/theme/home.php";