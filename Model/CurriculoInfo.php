<?php

namespace Landim32\MyCareerProfile\Model;

use stdClass;

class CurriculoInfo {

    private $nome = "";
    private $email1 = "";
    private $telefone1 = "";
    private $website = "";
    private $linkedin = "";
    private $github = "";
    private $twitter = "";
    private $vimeo = "";
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
     * @return string
     */
    public function getLinkedinUrl() {
        return "https://linkedin.com/in/" . $this->getLinkedin();
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
     * @return string
     */
    public function getGithubUrl() {
        return "https://github.com/" . $this->getGithub();
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
    public function getTwitterUrl() {
        return "https://twitter.com/" . $this->getTwitter();
    }

    /**
     * @return string
     */
    public function getVimeo() {
        return $this->vimeo;
    }

    /**
     * @param string $value
     */
    public function setVimeo($value) {
        $this->vimeo = $value;
    }

    /**
     * @return string
     */
    public function getVimeoUrl() {
        return "https://vimeo.com/" . $this->getVimeo();
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
     * @return CursoInfo[]
     */
    public function listarGraduacao() {
        $graduacoes = array();
        foreach ($this->listarCurso() as $curso) {
            if ($curso->getTipo() == CursoInfo::GRADUACAO) {
                $graduacoes[] = $curso;
            }
        }
        return $graduacoes;
    }

    /**
     * @return CargoInfo[]
     */
    public function listarCargo() {
        return $this->cargos;
    }

    /**
     * @return CargoInfo[]
     */
    public function listarCargoVisivel() {
        $cargos = array();
        foreach ($this->listarCargo() as $cargo) {
            if ($cargo->getSituacao() != CargoInfo::ESCONDIDO) {
                $cargos[] = $cargo;
            }
        }
        return $cargos;
    }

    /**
     * @return CargoInfo[]
     */
    public function listarCargoEscondido() {
        $cargos = array();
        foreach ($this->listarCargo() as $cargo) {
            if ($cargo->getSituacao() == CargoInfo::ESCONDIDO) {
                $cargos[] = $cargo;
            }
        }
        return $cargos;
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
     * @return ProjetoInfo[]
     */
    public function listarProjetoVisivel() {
        $projetos = array();
        foreach ($this->listarProjeto() as $projeto) {
            if ($projeto->getSituacao() != ProjetoInfo::OCULTO) {
                $projetos[] = $projeto;
            }
        }
        return $projetos;
    }

    /**
     * @return ProjetoInfo[]
     */
    public function listarProjetoEscondido() {
        $projetos = array();
        foreach ($this->listarProjeto() as $projeto) {
            if ($projeto->getSituacao() == ProjetoInfo::OCULTO) {
                $projetos[] = $projeto;
            }
        }
        return $projetos;
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
     * @return ConhecimentoInfo[]
     */
    public function listarConhecimentoVisivel() {
        return array_slice($this->conhecimentos, 0, 7);
    }

    /**
     * @return ConhecimentoInfo[]
     */
    public function listarConhecimentoOculto() {
        return array_slice($this->conhecimentos, 7);
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
    public function getCargoAtual() {
        if (count($this->cargos) > 0) {
            /** @var CargoInfo $cargo */
            $cargo = $this->cargos[0];
            return $cargo->getNome();
        }
        return "";
    }

    /**
     * @param stdClass $value
     * @param string $language
     * @return CurriculoInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $curriculo = new CurriculoInfo();
        if (isset($value->nome)) {
            $curriculo->setNome(getStr($value->nome, $language));
        }
        if (isset($value->email1)) {
            $curriculo->setEmail1(getStr($value->email1, $language));
        }
        if (isset($value->telefone1)) {
            $curriculo->setTelefone1(getStr($value->telefone1, $language));
        }
        if (isset($value->website)) {
            $curriculo->setWebsite(getStr($value->website, $language));
        }
        if (isset($value->linkedin)) {
            $curriculo->setLinkedin(getStr($value->linkedin, $language));
        }
        if (isset($value->github)) {
            $curriculo->setGithub(getStr($value->github, $language));
        }
        if (isset($value->twitter)) {
            $curriculo->setTwitter(getStr($value->twitter, $language));
        }
        if (isset($value->vimeo)) {
            $curriculo->setVimeo(getStr($value->vimeo, $language));
        }
        if (isset($value->resumo)) {
            $curriculo->setResumo(getStr($value->resumo, $language));
        }
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