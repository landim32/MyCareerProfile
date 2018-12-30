<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 14/06/2017
 * Time: 16:09
 */

namespace Landim32\MyCareerProfile\Model;

use stdClass;

class CursoInfo
{
    const GRADUACAO = "graduacao";
    const CURSO = "curso";

    private $curso = "";
    private $instituicao = "";
    private $data_inicio = "";
    private $data_termino = "";
    private $tipo = "";

    /**
     * @return string
     */
    public function getCurso() {
        return $this->curso;
    }

    /**
     * @param string $value
     */
    public function setCurso($value) {
        $this->curso = $value;
    }

    /**
     * @return string
     */
    public function getInstituicao() {
        return $this->instituicao;
    }

    /**
     * @param string $value
     */
    public function setInstituicao($value) {
        $this->instituicao = $value;
    }

    /**
     * @return string
     */
    public function getDataInicio() {
        return $this->data_inicio;
    }

    /**
     * @param string $value
     */
    public function setDataInicio($value) {
        $this->data_inicio = $value;
    }

    /**
     * @return string
     */
    public function getDataTermino() {
        return $this->data_termino;
    }

    /**
     * @param string $value
     */
    public function setDataTermino($value) {
        $this->data_termino = $value;
    }

    /**
     * @return string
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * @param string $value
     */
    public function setTipo($value) {
        $this->tipo = $value;
    }

    /**
     * @return int
     */
    public function getDataInicioAno() {
        return intval(date("Y", strtotime($this->getDataInicio())));
    }

    /**
     * @return int
     */
    public function getDataTerminoAno() {
        return intval(date("Y", strtotime($this->getDataTermino())));
    }

    /**
     * @param stdClass $value
     * @param string $language
     * @return CursoInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $curso = new CursoInfo();
        if (isset($value->curso)) {
            $curso->setCurso(getStr($value->curso, $language));
        }
        if (isset($value->instituicao)) {
            $curso->setInstituicao(getStr($value->instituicao, $language));
        }
        if (isset($value->inicio)) {
            $curso->setDataInicio(getStr($value->inicio, $language));
        }
        if (isset($value->termino)) {
            $curso->setDataTermino(getStr($value->termino, $language));
        }
        if (isset($value->tipo)) {
            $curso->setTipo(getStr($value->tipo, $language));
        }
        return $curso;
    }
}