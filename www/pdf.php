<?php

require dirname(__DIR__ ) . "/Core/config.inc.php";

use Emagine\BLL\CurriculoBLL;
use Emagine\BLL\CurriculoPDF;

$regraCurriculo = new CurriculoBLL();
$curriculo = $regraCurriculo->carregarJson(PROFILE . ".json", IDIOMA);

$curriculoPDF = new CurriculoPDF();
$curriculoPDF->setCurriculo($curriculo);
$curriculoPDF->gerar();
$curriculoPDF->Output("D", PROFILE . "-cv.pdf");