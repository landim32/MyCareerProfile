<?php

namespace Emagine\Model;

use stdClass;

/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 13/06/2017
 * Time: 12:23
 */
class CargoInfo
{
    private $nome = "";
    private $empresa = "";
    private $descricao = "";
    private $data_inicio = null;
    private $data_termino = null;
    private $atual = false;
    private $conhecimentos = array();

    /**
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * @param string $value
     */
    public function setNome($value) {
        $this->nome = $value;
    }

    /**
     * @return string
     */
    public function getEmpresa() {
        return $this->empresa;
    }

    /**
     * @param string $value
     */
    public function setEmpresa($value) {
        $this->empresa = $value;
    }

    /**
     * @return string
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * @param string $value
     */
    public function setDescricao($value) {
        $this->descricao = $value;
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
     * @return bool
     */
    public function getAtual() {
        return $this->atual;
    }

    /**
     * @param bool $value
     */
    public function setAtual($value) {
        $this->atual = $value;
    }

    /**
     * @return ConhecimentoInfo[]
     */
    public function listarConhecimento() {
        return $this->conhecimentos;
    }

    /**
     * @param ConhecimentoInfo $value
     */
    public function adicionarConhecimento($value) {
        $this->conhecimentos[] = $value;
    }

    /**
     * @return string
     */
    public function getDataInicioStr() {
        return date("M/Y", strtotime($this->getDataInicio()));
    }

    /**
     * @return string
     */
    public function getDataTerminoStr() {
        if (isNullOrEmpty($this->data_termino)) {
            return "Atual";
        }
        return date("M/Y", strtotime($this->getDataTermino()));
    }

    /**
     * @param stdClass $value
     * @param string $language
     * @return CargoInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $cargo = new CargoInfo();
        if (isset($value->nome)) {
            $cargo->setNome(getStr($value->nome, $language));
        }
        if (isset($value->empresa)) {
            $cargo->setEmpresa(getStr($value->empresa, $language));
        }
        if (isset($value->descricao)) {
            $cargo->setDescricao(getStr($value->descricao, $language));
        }
        if (isset($value->data_inicio)) {
            $cargo->setDataInicio(getStr($value->data_inicio, $language));
        }
        if (isset($value->data_termino)) {
            $cargo->setDataTermino(getStr($value->data_termino, $language));
        }
        if (isset($value->conhecimentos) && count($value->conhecimentos) > 0) {
            foreach ($value->conhecimentos as $conhecimento) {
                $cargo->adicionarConhecimento( ConhecimentoInfo::fromJson($conhecimento, $language) );
            }
        }
        return $cargo;
    }
}