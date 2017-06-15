<?php

require dirname(__DIR__ ) . "/Core/config.inc.php";

use Emagine\BLL\CurriculoBLL;
use Emagine\Model\ProjetoInfo;

$regraCurriculo = new CurriculoBLL();
$curriculo = $regraCurriculo->carregarJson("rodrigo.json", "pt_BR");

$regraCurriculo->gerarPDF($curriculo);