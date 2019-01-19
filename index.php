<?php

namespace Landim32\MyCareerProfile;

require __DIR__ . "/Core/config.inc.php";
require __DIR__ . "/Core/function.inc.php";
require __DIR__ . "/Core/idioma.inc.php";

use Exception;
use Landim32\MyCareerProfile\BLL\CurriculoBLL;
use Landim32\MyCareerProfile\Utils\CurriculoUtils;

try {
    $regraCurriculo = new CurriculoBLL();
    $curriculo = $regraCurriculo->carregarJson(PROFILE . ".json", IDIOMA);
    //$curriculo = (new CurriculoUtils())->gerar();

    require __DIR__ . "/theme/home.php";
}
catch (Exception $e) {
    die($e->getMessage());
}