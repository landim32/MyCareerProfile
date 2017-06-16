<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 15/06/2017
 * Time: 12:18
 */

namespace Emagine\BLL;

require_once dirname(__DIR__) . '/fpdf/fpdf.php';

use Emagine\Model\CargoInfo;
use FPDF;
use Emagine\Model\CurriculoInfo;

class CurriculoPDF extends FPDF
{
    private $curriculo = null;

    /**
     * @return CurriculoInfo
     */
    public function getCurriculo() {
        return $this->curriculo;
    }

    /**
     * @param CurriculoInfo $value
     */
    public function setCurriculo($value) {
        $this->curriculo = $value;
    }

    public function Header() {
        /*
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Title',1,0,'C');
        // Line break
        $this->Ln(20);
        */
    }

    public function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    private function desenharLinha() {
        $this->SetDrawColor(120, 120, 120);
        $this->Line(10, $this->GetY() + 2, $this->GetPageWidth() - 10, $this->GetY() + 2);
        $this->SetY($this->GetY() + 5);
    }

    /**
     * @param string $texto
     */
    private function escreverTituloSessao($texto) {
        $this->SetFont('Arial','',12);
        $this->SetTextColor(120, 120, 120);
        $this->Cell(0,7, utf8_decode($texto), 0, 1);
    }

    /**
     * @param CargoInfo $cargo
     */
    private function escreverCargo($cargo) {
        $this->SetFont('Arial','B',9);
        $this->SetTextColor(0, 0, 0);
        $this->Cell($this->GetStringWidth($cargo->getNome()),6, utf8_decode($cargo->getNome()));
        $this->SetFont('Arial','',9);
        $this->Cell($this->GetStringWidth(" em "),6, " " . _("at") . " ");
        $this->SetFont('Arial','B',9);
        $this->Cell($this->GetStringWidth($cargo->getEmpresa()),6, utf8_decode($cargo->getEmpresa()), 0, 1);

        $this->SetFont('Arial','',9);
        $this->SetDrawColor(120, 120, 120);
        $this->Cell(0,6, utf8_decode($cargo->getDataInicioStr() . " - " . $cargo->getDataTerminoStr()), 0, 1);
        $this->SetFont('Arial','',9);
        $this->SetTextColor(0, 0, 0);

        $this->SetX($this->GetX() + 5);
        $this->MultiCell(0, 5, utf8_decode($cargo->getDescricao()));

        $this->SetY($this->GetY() + 3);
    }

    /**
     * @param CurriculoInfo $curriculo
     */
    private function gerarDados($curriculo) {
        $this->SetFont('Arial','B',16);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0,6,utf8_decode($curriculo->getNome()), 0 ,1);

        $this->SetFont('Arial','',12);
        $this->SetTextColor(120, 120, 120);
        $this->Cell(0,6,utf8_decode($curriculo->getCargoAtual()), 0, 1);

        $this->desenharLinha();

        $this->SetTextColor(0, 0, 0);

        $y = $this->GetY();

        $this->SetFont('Arial','',9);
        $this->Cell(20,5,_("Phone") . ":", 0, 0, "R");
        $this->SetFont('Arial','B',9);
        $this->Cell(0,5,utf8_decode($curriculo->getTelefone1()), 0, 1);

        $this->SetFont('Arial','',9);
        $this->Cell(20,5,_("Email") . ":", 0, 0, "R");
        $this->SetFont('Arial','B',9);
        $this->Cell(0,5,utf8_decode($curriculo->getEmail1()), 0, 1);

        $colx = ($this->GetPageWidth() / 2) - 10;

        $this->SetXY($colx, $y);

        $this->SetFont('Arial','',9);
        $this->Cell(20,5,"LinkedIn:", 0, 0, "R");
        $this->SetFont('Arial','B',9);
        $this->Cell(0,5,$curriculo->getLinkedinUrl(), 0, 1);

        $this->SetX($colx);
        $this->SetFont('Arial','',9);
        $this->Cell(20,5,"GitHub:", 0, 0, "R");
        $this->SetFont('Arial','B',9);
        $this->Cell(0,5,$curriculo->getGithubUrl(), 0, 1);

        $this->SetX($colx);
        $this->SetFont('Arial','',9);
        $this->Cell(20,5,"Twitter:", 0, 0, "R");
        $this->SetFont('Arial','B',9);
        $this->Cell(0,5,$curriculo->getTwitterUrl(), 0, 1);

        $this->desenharLinha();

        $this->escreverTituloSessao(_("Career Profile"));
        $this->SetFont('Arial','',9);
        $this->SetTextColor(0, 0, 0);
        $this->MultiCell(0, 5, utf8_decode($curriculo->getResumo()));

        $this->desenharLinha();

        $this->escreverTituloSessao(_("Experiences"));

        foreach ($curriculo->listarCargo() as $cargo) {
            $this->escreverCargo($cargo);
        }


    }

    public function gerar() {
        $curriculo = $this->getCurriculo();
        $this->AliasNbPages();
        $this->AddPage();
        $this->gerarDados($curriculo);
        /*
        $this->SetFont('Arial','',12);
        for($i=1;$i<=40;$i++)
            $this->Cell(0,10,'Printing line number '.$i,0,1);
        */
    }

}