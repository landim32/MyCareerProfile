<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 14/06/2017
 * Time: 16:09
 */

namespace Landim32\MyCareerProfile\Model;

use stdClass;

class ConquistaInfo
{
    const GRADUACAO = "graduacao";
    const CURSO = "curso";
    const CERTIFICACAO = "certificacao";

    private $id = "";
    private $nome = "";
    private $categoria = "";
    private $instituicao = "";
    private $data_inicio = "";
    private $data_termino = "";
    private $carga_horaria = 0;
    private $tipo = "";

    /**
     * @return string
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setId($value) {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setNome($value) {
        $this->nome = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategoria() {
        return $this->categoria;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCategoria($value) {
        $this->categoria = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getInstituicao() {
        return $this->instituicao;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setInstituicao($value) {
        $this->instituicao = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataInicio() {
        return $this->data_inicio;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setDataInicio($value) {
        $this->data_inicio = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataTermino() {
        return $this->data_termino;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setDataTermino($value) {
        $this->data_termino = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getCargaHoraria() {
        return $this->carga_horaria;
    }

    /**
     * @param int $value
     */
    public function setCargaHoraria($value) {
        $this->carga_horaria = $value;
    }

    /**
     * @return string
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTipo($value) {
        $this->tipo = $value;
        return $this;
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

    public function toString() {
        $cursoStr = $this->getNome() . " - " . $this->getInstituicao();
        if ($this->getCargaHoraria() > 0) {
            $cursoStr .= " (" . $this->getCargaHoraria() . " ";
            $cursoStr .= ($this->getCargaHoraria() > 1) ? "horas" : "hora";
            $cursoStr .= ")";
        }
        if (!isNullOrEmpty($this->getDataInicio()) && !isNullOrEmpty($this->getDataTermino())) {
            if ($this->getDataInicioAno() == $this->getDataTerminoAno()) {
                $cursoStr .= " cursado em " . $this->getDataInicioAno();
            }
            else {
                $cursoStr .= " entre " . $this->getDataInicioAno() . " e " . $this->getDataTerminoAno();
            }
        }
        else if (!isNullOrEmpty($this->getDataInicio())) {
            $cursoStr .= " cursado em " . $this->getDataInicioAno();
        }
        else if (!isNullOrEmpty($this->getDataTermino())) {
            $cursoStr .= " cursado em " . $this->getDataTerminoAno();
        }
        return $cursoStr;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @param stdClass $value
     * @param string $language
     * @return ConquistaInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $curso = new ConquistaInfo();
        if (isset($value->id)) {
            $curso->setId($value->id);
        }
        if (isset($value->nome)) {
            $curso->setNome(getStr($value->nome, $language));
        }
        if (isset($value->categoria)) {
            $curso->setCategoria(getStr($value->categoria, $language));
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
        if (isset($value->carga_horaria)) {
            $curso->setCargaHoraria($value->carga_horaria);
        }
        if (isset($value->tipo)) {
            $curso->setTipo($value->tipo);
        }
        return $curso;
    }

}