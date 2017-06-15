<?php

namespace Emagine\Model;

use stdClass;

/**
 * Class ConhecimentoInfo
 */
class ConhecimentoInfo
{
    const PRIMARY = "label label-primary";
    const INFO = "label label-info";
    const SUCCESS = "label label-success";

    private $nome;
    private $estilo;
    private $porcentagem = 0;

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
    public function getEstilo() {
        return $this->estilo;
    }

    /**
     * @param string $value
     */
    public function setEstilo($value) {
        $this->estilo = $value;
    }

    /**
     * @return int
     */
    public function getPorcentagem() {
        return $this->porcentagem;
    }

    /**
     * @param int $value
     */
    public function setPorcentagem($value) {
        $this->porcentagem = $value;
    }

    /**
     * @param stdClass $value
     * @param string $language
     * @return ConhecimentoInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $conhecimento = new ConhecimentoInfo();
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