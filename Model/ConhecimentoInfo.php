<?php

namespace Emagine\Model;

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

}