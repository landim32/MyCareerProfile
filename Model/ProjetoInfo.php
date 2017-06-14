<?php

namespace Emagine\Model;

use stdClass;

/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 13/06/2017
 * Time: 12:23
 */
class ProjetoInfo
{
    private $nome;
    private $descricao;
    private $data_inicio;
    private $data_termino;
    private $atual = false;
    private $links = array();
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
     * @return LinkInfo[]
     */
    public function listarLinks() {
        return $this->links;
    }

    /**
     * @param LinkInfo $value
     */
    public function adicionarLink($value) {
        $this->links[] = $value;
    }

    /**
     * @param stdClass $value
     * @param string $language
     * @return ProjetoInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $projeto = new ProjetoInfo();
        return $projeto;
    }
}