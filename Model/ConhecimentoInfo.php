<?php

namespace Landim32\MyCareerProfile\Model;

use stdClass;

/**
 * Class ConhecimentoInfo
 */
class ConhecimentoInfo
{
    const PRIMARY = "label label-primary";
    const INFO = "label label-info";
    const SUCCESS = "label label-success";

    private $id;
    private $nome;
    private $estilo;
    private $porcentagem = 0;

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
    public function getEstilo() {
        return $this->estilo;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setEstilo($value) {
        $this->estilo = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getPorcentagem() {
        return $this->porcentagem;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setPorcentagem($value) {
        $this->porcentagem = $value;
        return $this;
    }

    /**
     * @param stdClass $value
     * @param string $language
     * @return ConhecimentoInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $conhecimento = new ConhecimentoInfo();
        if (isset($value->id)) {
            $conhecimento->setId($value->id);
        }
        if (isset($value->nome)) {
            $conhecimento->setNome(getStr($value->nome, $language));
        }
        if (isset($value->estilo)) {
            $conhecimento->setEstilo(getStr($value->estilo, $language));
        }
        if (isset($value->valor)) {
            $conhecimento->setPorcentagem($value->valor);
        }
        elseif (isset($value->value)) {
            $conhecimento->setPorcentagem($value->value);
        }
        elseif (isset($value->procentagem)) {
            $conhecimento->setPorcentagem($value->porcetagem);
        }
        return $conhecimento;
    }

}