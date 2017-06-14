<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 14/06/2017
 * Time: 16:09
 */

namespace Emagine\Model;

use stdClass;

class CursoInfo
{
    private $curso = "";
    private $instituicao = "";
    private $inicio = "";
    private $termino = "";

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
    public function getInicio() {
        return $this->inicio;
    }

    /**
     * @param string $value
     */
    public function setInicio($value) {
        $this->inicio = $value;
    }

    /**
     * @return string
     */
    public function getTermino() {
        return $this->termino;
    }

    /**
     * @param string $value
     */
    public function setTermino($value) {
        $this->termino = $value;
    }

    /**
     * @param stdClass $value
     * @param string $language
     * @return CursoInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $curso = new CursoInfo();
        return $curso;
    }
}