<?php

namespace Emagine\BLL;

use FPDF;
use Emagine\Model\CurriculoInfo;

/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 14/06/2017
 * Time: 15:27
 */
class CurriculoBLL
{
    /**
     * @param string $arquivo
     * @param string $language
     * @return CurriculoInfo
     */
    public function carregarJson($arquivo, $language = "pt_BR") {
        $fullPath = dirname( __DIR__ ) . "/Core/" . $arquivo;
        $json = file_get_contents( $fullPath );
        $curriculo = json_decode($json);
        return CurriculoInfo::fromJson($curriculo, $language);
    }

    /**
     * @param CurriculoInfo $curriculo
     */
    public function gerarPDF($curriculo) {
        require_once dirname(__DIR__) . '/fpdf/fpdf.php';

        $pdf = new FPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);
        for($i=1;$i<=40;$i++)
            $pdf->Cell(0,10,'Printing line number '.$i,0,1);
        $pdf->Output();
    }
}