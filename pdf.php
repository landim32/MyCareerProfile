<?php

require __DIR__ . "/Core/config.inc.php";
require __DIR__ . "/Core/function.inc.php";
require __DIR__ . "/Core/idioma.inc.php";

use Landim32\MyCareerProfile\BLL\CurriculoBLL;
use Landim32\MyCareerProfile\BLL\CurriculoPDF;

$regraCurriculo = new CurriculoBLL();
$curriculo = $regraCurriculo->carregarJson(PROFILE . ".json", IDIOMA);

$curriculoPDF = new CurriculoPDF();
$curriculoPDF->setCurriculo($curriculo);
$curriculoPDF->gerar();
$curriculoPDF->Output("D", PROFILE . "-cv.pdf");