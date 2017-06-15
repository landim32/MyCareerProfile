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
    const ATIVO = "ativo";
    const OCULTO = "oculto";

    const WEBSITE = "website";
    const ANDROID = "android";
    const IOS = "ios";

    private $nome = "";
    private $url = "";
    private $descricao = "";
    private $data_inicio = null;
    private $data_termino = null;
    private $situacao = "ativo";
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
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $value
     */
    public function setUrl($value) {
        $this->url = $value;
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
     * @return string
     */
    public function getSituacao() {
        return $this->situacao;
    }

    /**
     * @param string $value
     */
    public function setSituacao($value) {
        $this->situacao = $value;
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
        if (isset($value->nome)) {
            $projeto->setNome(getStr($value->nome, $language));
        }
        if (isset($value->url)) {
            $projeto->setUrl(getStr($value->url, $language));
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
        if (isset($value->conhecimentos) && count($value->conhecimentos) > 0) {
            foreach ($value->conhecimentos as $conhecimento) {
                $projeto->adicionarConhecimento( ConhecimentoInfo::fromJson($conhecimento, $language) );
            }
        }
        return $projeto;
    }
}