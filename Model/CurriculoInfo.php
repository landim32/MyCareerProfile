<?php

namespace Emagine\Model;

use stdClass;

class CurriculoInfo {

    private $nome = "";
    private $email1 = "";
    private $telefone1 = "";
    private $website = "";
    private $linkedin = "";
    private $github = "";
    private $twitter = "";
    private $resumo = "";
    private $linguas = array();
    private $cursos = array();
    private $cargos = array();
    private $projetos = array();
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
    public function getEmail1() {
        return $this->email1;
    }

    /**
     * @param string $value
     */
    public function setEmail1($value) {
        $this->email1 = $value;
    }

    /**
     * @return string
     */
    public function getTelefone1() {
        return $this->telefone1;
    }

    /**
     * @param string $value
     */
    public function setTelefone1($value) {
        $this->telefone1 = $value;
    }

    /**
     * @return string
     */
    public function getWebsite() {
        return $this->website;
    }

    /**
     * @param string $value
     */
    public function setWebsite($value) {
        $this->website = $value;
    }

    /**
     * @return string
     */
    public function getLinkedin() {
        return $this->linkedin;
    }

    /**
     * @param string $value
     */
    public function setLinkedin($value) {
        $this->linkedin = $value;
    }

    /**
     * @return string
     */
    public function getGithub() {
        return $this->github;
    }

    /**
     * @param string $value
     */
    public function setGithub($value) {
        $this->github = $value;
    }

    /**
     * @return string
     */
    public function getTwitter() {
        return $this->twitter;
    }

    /**
     * @param string $value
     */
    public function setTwitter($value) {
        $this->twitter = $value;
    }

    /**
     * @return string
     */
    public function getResumo() {
        return $this->resumo;
    }

    /**
     * @param string $value
     */
    public function setResumo($value) {
        $this->resumo = $value;
    }

    /**
     * @return LinguaInfo[]
     */
    public function listarLingua() {
        return $this->linguas;
    }

    /**
     * @param LinguaInfo $value
     */
    public function adicionarLingua($value) {
        $this->linguas[] = $value;
    }

    /**
     * @return CursoInfo[]
     */
    public function listarCurso() {
        return $this->cursos;
    }

    /**
     * @param CursoInfo $value
     */
    public function adicionarCurso($value) {
        $this->cursos[] = $value;
    }

    /**
     * @return CargoInfo[]
     */
    public function listarCargo() {
        return $this->cargos;
    }

    /**
     * @param CargoInfo $value
     */
    public function adicionarCargo($value) {
        $this->cargos[] = $value;
    }

    /**
     * @return ProjetoInfo[]
     */
    public function listarProjeto() {
        return $this->projetos;
    }

    /**
     * @param ProjetoInfo $value
     */
    public function adicionarProjeto($value) {
        $this->projetos[] = $value;
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
     * @param stdClass $value
     * @param string $language
     * @return CurriculoInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $curriculo = new CurriculoInfo();
        $curriculo->setNome( getStr( $value->nome, $language ) );
        $curriculo->setEmail1( getStr( $value->email1, $language ) );
        $curriculo->setTelefone1( getStr( $value->telefone1, $language ) );
        $curriculo->setWebsite( getStr( $value->website, $language ) );
        $curriculo->setLinkedin( getStr( $value->linkedin, $language ) );
        $curriculo->setGithub( getStr( $value->github, $language ) );
        $curriculo->setTwitter( getStr( $value->twitter, $language ) );
        $curriculo->setResumo( getStr( $value->resumo, $language ) );
        if (isset($value->linguas) && count($value->linguas) > 0) {
            foreach ($value->linguas as $lingua) {
                $curriculo->adicionarLingua( LinguaInfo::fromJson($lingua, $language) );
            }
        }
        if (isset($value->cursos) && count($value->cursos) > 0) {
            foreach ($value->cursos as $curso) {
                $curriculo->adicionarCurso( CursoInfo::fromJson($curso, $language) );
            }
        }
        if (isset($value->cargos) && count($value->cargos) > 0) {
            foreach ($value->cargos as $cargo) {
                $curriculo->adicionarCargo( CargoInfo::fromJson($cargo, $language) );
            }
        }
        if (isset($value->projetos) && count($value->projetos) > 0) {
            foreach ($value->projetos as $projeto) {
                $curriculo->adicionarProjeto( ProjetoInfo::fromJson($projeto, $language) );
            }
        }
        if (isset($value->conhecimentos) && count($value->conhecimentos) > 0) {
            foreach ($value->conhecimentos as $conhecimento) {
                $curriculo->adicionarConhecimento( ConhecimentoInfo::fromJson($conhecimento, $language) );
            }
        }
        return $curriculo;
    }
}