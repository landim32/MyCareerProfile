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
use Emagine\Model\ConhecimentoInfo;
use Emagine\Model\ProjetoInfo;
use FPDF;
use Emagine\Model\CurriculoInfo;

class CurriculoPDF extends FPDF
{
    const PRETO = "preto";
    const CINZA = "cinza";
    const AZUL = "azul";

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
        $this->Cell(0,10,$this->PageNo(),0,0,'R');
    }

    /**
     * @param string $cor
     */
    private function definirCor($cor) {
        switch ($cor) {
            case CurriculoPDF::CINZA:
                $this->SetTextColor(120,120,120);
                break;
            case CurriculoPDF::AZUL:
                $this->SetTextColor(0,0,139);
                break;
            default:
                $this->SetTextColor(0,0,0);
                break;
        }
    }

    /**
     * @param string $texto
     * @param int $size
     * @param string $cor
     * @param int $h
     * @param int $w
     */
    private function paragrafo($texto, $size, $cor, $h, $w = 0) {
        $this->definirCor($cor);
        $this->SetFont('Arial','',$size);
        $this->MultiCell(0, 4, utf8_decode($texto));
    }

    /**
     * @param string $text
     * @param int $size
     * @param string $cor
     * @param int $h
     * @param string $align
     * @param int|null $w
     * @param string $style
     * @param bool $ln
     */
    private function escrever($text, $size, $cor, $h, $align = "", $w = 0, $style = "", $ln = false) {
        $this->definirCor($cor);
        $this->SetFont('Arial', $style, $size);
        $largura = is_null($w) ? $this->GetStringWidth(utf8_decode($text)) : $w;
        $this->Cell($largura, $h, utf8_decode($text), 0, (($ln === true) ? 1 : 0), $align);
    }

    /**
     * @param string $text
     * @param int $size
     * @param string $cor
     * @param int $h
     * @param string $style
     */
    private function escreverX($text, $size, $cor, $h, $style = "") {
        $this->escrever($text, $size,$cor, $h,"", null,$style,false);
    }

    /**
     * @param string $text
     * @param int $size
     * @param string $cor
     * @param int $h
     * @param string $style
     */
    private function escreverXLn($text, $size, $cor, $h, $style = "") {
        $this->escrever($text, $size,$cor, $h,"", null,$style,true);
    }

    /**
     * @param string $text
     * @param int $size
     * @param int $h
     * @param int $w
     */
    private function escreverLabel($text, $size, $h, $w) {
        $this->escrever($text, $size,CurriculoPDF::CINZA,$h,"R", $w,"",false);
    }

    /**
     * @param string $text
     * @param int $size
     * @param string $cor
     * @param int $h
     * @param string $align
     * @param int $w
     * @param string $style
     */
    private function escreverLn($text, $size, $cor, $h, $align = "", $w = 0, $style = "") {
        $this->escrever($text, $size, $cor, $h, $align, $w, $style, true);
    }

    /**
     * @param string $text
     * @param int $size
     * @param string $cor
     * @param int $h
     * @param string $align
     * @param int $w
     * @param bool $ln
     */
    private function escreverNegrito($text, $size, $cor, $h, $align = "", $w = 0, $ln = false) {
        $this->escrever($text, $size, $cor, $h, $align, $w, "B", $ln);
    }

    /**
     * @param string $text
     * @param int $size
     * @param string $cor
     * @param int $h
     * @param string $align
     * @param int $w
     */
    private function escreverNegritoLn($text, $size, $cor, $h, $align = "", $w = 0) {
        $this->escrever($text, $size, $cor, $h, $align, $w, "B", true);
    }

    /**
     * @param string $text
     * @param int $size
     * @param int $h
     * @param string $align
     * @param int $w
     * @param bool $ln
     */
    private function escreverLink($text, $size, $h, $align = "", $w = 0, $ln = false) {
        $this->escrever($text, $size, CurriculoPDF::AZUL, $h, $align, $w, "U", $ln);
    }

    /**
     * @param string $text
     * @param int $size
     * @param int $h
     * @param string $align
     * @param int $w
     */
    private function escreverLinkLn($text, $size, $h, $align = "", $w = 0) {
        $this->escrever($text, $size, CurriculoPDF::AZUL, $h, $align, $w, "U", true);
    }

    /**
     * @param ConhecimentoInfo[] $conhecimentos
     * @return string
     */
    private function consolidarConhecimento($conhecimentos) {
        $vetor = array();
        foreach ($conhecimentos as $conhecimento) {
            $vetor[] = $conhecimento->getNome();
        }
        $str = implode(", ", $vetor);
        return str_lreplace(", ", " " . _("and") . " ", $str);
    }

    private function desenharLinha() {
        $this->SetDrawColor(120, 120, 120);
        $this->Line(10, $this->GetY() + 2, $this->GetPageWidth() - 10, $this->GetY() + 2);
        $this->SetY($this->GetY() + 5);
    }

    /**
     * @param string $texto
     */
    private function escreverTitulo($texto) {
        $this->SetTextColor(120,120,120);
        $this->SetFont('Arial', "B", 12);
        $this->Cell(0,7, utf8_decode($texto), 0, 1);
    }

    /**
     * @param CurriculoInfo $curriculo
     */
    private function gerarDados($curriculo) {
        $this->escreverNegritoLn($curriculo->getNome(),16,CurriculoPDF::PRETO,6);
        $this->escreverNegritoLn($curriculo->getCargoAtual(),12,CurriculoPDF::CINZA,6);
        $this->desenharLinha();

        $y = $this->GetY();

        //$this->escrever(_("Phone") . ":",9,CurriculoPDF::CINZA,5,"R",20, "",false);
        $this->escreverLabel(_("Phone") . ":",9,5,20);
        $this->escreverNegritoLn($curriculo->getTelefone1(),9,CurriculoPDF::PRETO,5);

        $this->escreverLabel(_("Email") . ":",9,5,20);
        $this->escreverNegritoLn($curriculo->getEmail1(),9,CurriculoPDF::PRETO,5);

        $colx = ($this->GetPageWidth() / 2) - 10;

        $this->SetXY($colx, $y);

        $this->escreverLabel(_("LinkedIn") . ":",9,5,20);
        $this->escreverLinkLn($curriculo->getLinkedinUrl(),9,5);

        $this->SetX($colx);
        $this->escreverLabel(_("GitHub") . ":",9,5,20);
        $this->escreverLinkLn($curriculo->getGithubUrl(),9,5);

        $this->SetX($colx);
        $this->escreverLabel(_("Twitter") . ":",9,5,20);
        $this->escreverLinkLn($curriculo->getTwitterUrl(),9,5);

        $this->desenharLinha();

        $this->escreverTitulo(_("Career Profile"));
        $this->paragrafo($curriculo->getResumo(),9,CurriculoPDF::PRETO,4);
    }

    /**
     * @param CargoInfo $cargo
     */
    private function escreverCargo($cargo) {
        $this->escreverX($cargo->getNome(),9,CurriculoPDF::PRETO, 4, "B");
        $this->escreverX(" " . _("at") . " ",9,CurriculoPDF::PRETO, 4);
        $this->escreverXLn($cargo->getEmpresa(),9,CurriculoPDF::PRETO, 4, "B");

        $data = $cargo->getDataInicioStr() . " - " . $cargo->getDataTerminoStr();
        $this->escreverLn($data,9,CurriculoPDF::CINZA,4);
        $descricao = $cargo->getDescricao() . " " . _("Related skills") . ": " . $this->consolidarConhecimento($cargo->listarConhecimento()) . ".";
        $this->SetX($this->GetX() + 5);
        $this->paragrafo($descricao, 9, CurriculoPDF::PRETO,4);
        $this->SetY($this->GetY() + 2);
    }

    /**
     * @param CurriculoInfo $curriculo
     */
    private function gerarCargo($curriculo) {
        $this->desenharLinha();
        $this->escreverTitulo(_("Experiences"));
        foreach ($curriculo->listarCargo() as $cargo) {
            $this->escreverCargo($cargo);
        }
    }

    /**
     * @param ProjetoInfo $projeto
     */
    private function escreverProjeto($projeto) {
        $this->escreverNegritoLn($projeto->getNome(),9,CurriculoPDF::PRETO,6);
        $this->SetX($this->GetX() + 3);

        $conhecimento = $this->consolidarConhecimento($projeto->listarConhecimento());
        $descricao = $projeto->getDescricao() . " " . _("Related skills") . ": " . $conhecimento . ".";
        $this->paragrafo($descricao, 9, CurriculoPDF::PRETO, 4);

        foreach ($projeto->listarLinks() as $link) {
            $this->escreverLabel($link->getNome() . ": ",8,4,40);
            $this->escreverLinkLn($link->getUrl(),8,4);
        }

        $this->SetY($this->GetY() + 2);
    }

    /**
     * @param CurriculoInfo $curriculo
     */
    private function gerarProjeto($curriculo) {
        $this->desenharLinha();
        $this->escreverTitulo(_("Projects"));
        foreach ($curriculo->listarProjeto() as $projeto) {
            $this->escreverProjeto($projeto);
        }
    }

    /**
     * @param CurriculoInfo $curriculo
     */
    private function gerarConhecimento($curriculo) {
        $this->desenharLinha();
        $this->escreverTitulo(_("Skills"));
        $conhecimento = $this->consolidarConhecimento($curriculo->listarConhecimento());
        $this->paragrafo($conhecimento, 10, CurriculoPDF::PRETO, 5);
    }

    /**
     * @param CurriculoInfo $curriculo
     */
    private function gerarIdioma($curriculo) {
        $this->desenharLinha();
        $this->escreverTitulo(_("Language"));
        $vetor = array();
        foreach ($curriculo->listarLingua() as $lingua) {
            $vetor[] = $lingua->getNome() . " (" . $lingua->getTipoStr() . ")";
        }
        $str = implode(", ", $vetor);
        $descricao = str_lreplace(", ", " " . _("and") . " ", $str);
        $this->paragrafo($descricao, 10, CurriculoPDF::PRETO, 5);
    }

    public function gerar() {
        $curriculo = $this->getCurriculo();
        $this->AliasNbPages();
        $this->AddPage();
        $this->gerarDados($curriculo);
        $this->gerarCargo($curriculo);
        $this->gerarProjeto($curriculo);
        $this->gerarConhecimento($curriculo);
        $this->gerarIdioma($curriculo);
    }

}