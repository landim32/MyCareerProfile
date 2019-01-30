<?php

namespace Landim32\MyCareerProfile\Model;

use stdClass;

/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 13/06/2017
 * Time: 12:23
 */
class ProjetoInfo
{
    const ATIVO = "ativo";
    const OCULTO = "oculto";

    const WEBSITE = "website";
    const ANDROID = "android";
    const IOS = "ios";

    private $id = "";
    private $nome = "";
    private $url = "";
    private $resumo = "";
    private $descricao = "";
    private $data_inicio = null;
    private $data_termino = null;
    private $situacao = "ativo";
    private $links = array();

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
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setUrl($value) {
        $this->url = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getResumo() {
        return $this->resumo;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setResumo($value) {
        $this->resumo = $value;
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
     * @return LinkInfo[]
     */
    public function listarLinks() {
        return $this->links;
    }

    /**
     * @param LinkInfo $value
     * @return $this
     */
    public function adicionarLink($value) {
        $this->links[] = $value;
        return $this;
    }

    /**
     * @param stdClass $value
     * @param string $language
     * @return ProjetoInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $projeto = new ProjetoInfo();
        if (isset($value->nome)) {
            $projeto->setNome(getStr($value->nome, $language));
        }
        if (isset($value->url)) {
            $projeto->setUrl(getStr($value->url, $language));
        }
        if (isset($value->resumo)) {
            $projeto->setResumo(getStr($value->resumo, $language));
        }
        if (isset($value->descricao)) {
            $projeto->setDescricao(getStr($value->descricao, $language));
        }
        if (isset($value->data_inicio)) {
            $projeto->setDataInicio($value->data_inicio);
        }
        if (isset($value->data_termino)) {
            $projeto->setDataTermino($value->data_termino);
        }
        if (isset($value->situacao)) {
            $projeto->setSituacao($value->situacao);
        }
        if (isset($value->links) && count($value->links) > 0) {
            foreach ($value->links as $link) {
                $projeto->adicionarLink( LinkInfo::fromJson($link, $language) );
            }
        }
        return $projeto;
    }
}