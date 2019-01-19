<?php

namespace Landim32\MyCareerProfile\Model;

use stdClass;

/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 13/06/2017
 * Time: 12:23
 */
class CargoInfo
{
    const ATIVO = "ativo";
    const ESCONDIDO = "escondido";

    private $id = "";
    private $nome = "";
    private $empresa = "";
    private $descricao = "";
    private $data_inicio = null;
    private $data_termino = null;
    private $situacao = "ativo";
    private $conhecimentos = array();

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
    public function getEmpresa() {
        return $this->empresa;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setEmpresa($value) {
        $this->empresa = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setDescricao($value) {
        $this->descricao = $value;
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
     * @return string
     */
    public function getSituacao() {
        return $this->situacao;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setSituacao($value) {
        $this->situacao = $value;
        return $this;
    }

    /**
     * @return ConhecimentoInfo[]
     */
    public function listarConhecimento() {
        return $this->conhecimentos;
    }

    /**
     * @param ConhecimentoInfo $value
     * @return $this
     */
    public function adicionarConhecimento($value) {
        $this->conhecimentos[] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataInicioStr() {
        return strftime("%h/%Y", strtotime($this->getDataInicio()));
    }

    /**
     * @return string
     */
    public function getDataTerminoStr() {
        if (isNullOrEmpty($this->data_termino)) {
            return _("Present");
        }
        return strftime("%h/%Y", strtotime($this->getDataTermino()));
    }

    /**
     * @return string
     */
    public function getTempo() {
        $date1 = strtotime($this->getDataInicio());
        if (is_null($this->getDataTermino())) {
            $date2 = time();
        }
        else {
            $date2 = strtotime($this->getDataTermino());
        }
        $diff = abs($date2 - $date1);

        $ano = floor($diff / (365*60*60*24));
        $mes = floor(($diff - $ano * 365*60*60*24) / (30*60*60*24));

        $str = "";
        if ($ano > 0 && $mes > 0) {
            $str = ($ano > 1) ? sprintf(_("%s years"), $ano) : sprintf(_("%s year"), $ano);
            $str .= " " . _("and") . " ";
            $str .= ($mes > 1) ? sprintf(_("%s months"), $mes) : sprintf(_("%s month"), $mes);
        }
        elseif ($ano > 0) {
            $str = ($ano > 1) ? sprintf(_("%s years"), $ano) : sprintf(_("%s year"), $ano);
        }
        elseif ($mes > 0) {
            $str .= ($mes > 1) ? sprintf(_("%s months"), $mes) : sprintf(_("%s month"), $mes);
        }
        else {
            $str = _("Less than a month");
        }
        return $str;
    }

    /**
     * @param stdClass $value
     * @param string $language
     * @return CargoInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $cargo = new CargoInfo();
        if (isset($value->id)) {
            $cargo->setId($value->id);
        }
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
            $cargo->setDataInicio($value->data_inicio);
        }
        if (isset($value->data_termino)) {
            $cargo->setDataTermino($value->data_termino);
        }
        if (isset($value->situacao)) {
            $cargo->setSituacao($value->situacao);
        }
        if (isset($value->conhecimentos) && count($value->conhecimentos) > 0) {
            foreach ($value->conhecimentos as $conhecimento) {
                $cargo->adicionarConhecimento( ConhecimentoInfo::fromJson($conhecimento, $language) );
            }
        }
        return $cargo;
    }
}