<?php

require dirname(__DIR__ ) . "/Core/config.inc.php";

use Emagine\BLL\CurriculoBLL;
use Emagine\BLL\CurriculoPDF;

$regraCurriculo = new CurriculoBLL();
$curriculo = $regraCurriculo->carregarJson("rodrigo.json", "pt_BR");

$curriculoPDF = new CurriculoPDF();
$curriculoPDF->setCurriculo($curriculo);
$curriculoPDF->gerar();
$curriculoPDF->output();