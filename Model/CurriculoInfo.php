<?php

namespace Landim32\MyCareerProfile\Model;

use stdClass;

class CurriculoInfo {

    private $base = "";
    private $nome = "";
    private $basico = "";
    private $endereco = "";
    private $email1 = "";
    private $telefone1 = "";
    private $website = "";
    private $linkedin = "";
    private $github = "";
    private $twitter = "";
    private $vimeo = "";
    private $resumo = "";
    private $pretensao = "";
    private $idioma = array();
    private $conquista = array();
    private $cargos = array();
    private $projetos = array();
    private $conhecimentos = array();

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setBase($value) {
        $this->base = $value;
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
    public function getBasico() {
        return $this->basico;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setBasico($value) {
        $this->basico = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndereco() {
        return $this->endereco;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setEndereco($value) {
        $this->endereco = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail1() {
        return $this->email1;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setEmail1($value) {
        $this->email1 = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelefone1() {
        return $this->telefone1;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTelefone1($value) {
        $this->telefone1 = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite() {
        return $this->website;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setWebsite($value) {
        $this->website = $value;
        return $this;
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
     * @return $this
     */
    public function setLinkedin($value) {
        $this->linkedin = $value;
        return $this;
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
     * @return $this
     */
    public function setGithub($value) {
        $this->github = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTwitter() {
        return $this->twitter;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTwitter($value) {
        $this->twitter = $value;
        return $this;
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
     * @return $this
     */
    public function setVimeo($value) {
        $this->vimeo = $value;
        return $this;
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
     * @return $this
     */
    public function setResumo($value) {
        $this->resumo = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPretensao() {
        return $this->pretensao;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPretensao($value) {
        $this->pretensao = $value;
        return $this;
    }

    /**
     * @return IdiomaInfo[]
     */
    public function listarIdioma() {
        return $this->idioma;
    }

    /**
     * @param IdiomaInfo $value
     * @return $this
     */
    public function adicionarIdioma($value) {
        if (isNullOrEmpty($value->getId())) {
            $value->setId(md5(uniqid()));
        }
        $this->idioma[$value->getId()] = $value;
        return $this;
    }

    /**
     * @return ConquistaInfo[]
     */
    public function listarConquista() {
        return $this->conquista;
    }

    /**
     * @param ConquistaInfo $value
     * @return $this
     */
    public function adicionarConquista($value) {
        if (isNullOrEmpty($value->getId())) {
            $value->setId(md5(uniqid()));
        }
        $this->conquista[$value->getId()] = $value;
        return $this;
    }

    /**
     * @return ConquistaInfo[]
     */
    public function listarGraduacao() {
        $graduacoes = array();
        foreach ($this->listarConquista() as $curso) {
            if ($curso->getTipo() == ConquistaInfo::GRADUACAO) {
                $graduacoes[] = $curso;
            }
        }
        return $graduacoes;
    }

    /**
     * @return ConquistaInfo[]
     */
    public function listarCertificacao() {
        $certificacoes = array();
        foreach ($this->listarConquista() as $conquista) {
            if ($conquista->getTipo() == ConquistaInfo::CERTIFICACAO) {
                $certificacoes[] = $conquista;
            }
        }
        return $certificacoes;
    }

    /**
     * @return ConquistaInfo[]
     */
    public function listarCurso() {
        $certificacoes = array();
        foreach ($this->listarConquista() as $conquista) {
            if ($conquista->getTipo() == ConquistaInfo::CURSO) {
                $certificacoes[] = $conquista;
            }
        }
        return $certificacoes;
    }

    /**
     * @return array<string,ConquistaInfo>
     */
    public function listarCursoPorCategoria() {
        $cursosPorCategoria = array();
        $categoria = null;
        foreach ($this->listarCurso() as $curso) {
            if (!array_key_exists($curso->getCategoria(), $cursosPorCategoria)) {
                $cursosPorCategoria[$curso->getCategoria()] = array();
            }
            $cursosPorCategoria[$curso->getCategoria()][] = $curso;
        }
        return $cursosPorCategoria;
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
     * @return string|null
     */
    public function getDataUltimoCargoVisivel() {
        $cargos = $this->listarCargoVisivel();
        if (count($cargos) > 0) {
            $cargo = array_values($cargos)[count($cargos) - 1];
            return $cargo->getDataTerminoStr();
        }
        return null;
    }

    /**
     * @return string
     */
    public function getResumoCargoEscondido() {
        $cargos = $this->listarCargoEscondido();
        $str = "Antes de " . $this->getDataUltimoCargoVisivel() . " trabalhou em ";
        $str .= count($cargos);
        $str .= " ";
        $str .= (count($cargos) > 1) ? "cargos" : "cargo";
        $str .= " como: ";
        $cargoArray = array();
        foreach ($cargos as $cargo) {
            $cargoStr = $cargo->getNome() . " em " . $cargo->getEmpresa() . " por ";
            $cargoStr .= $cargo->getTempo();
            $cargoStr .= " até " . $cargo->getDataTerminoAno();
            $cargoArray[] = $cargoStr;
        }
        $str .= implode("; ", $cargoArray);
        $str .= ".";
        return $str;
    }

    /**
     * @param CargoInfo $value
     * @return $this
     */
    public function adicionarCargo($value) {
        if (isNullOrEmpty($value->getId())) {
            $value->setId(md5(uniqid()));
        }
        $this->cargos[$value->getId()] = $value;
        return $this;
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
     * @return string
     */
    public function getResumoProjetoEscondido() {
        $projetos = $this->listarProjetoEscondido();
        $cargoArray = array();
        foreach ($projetos as $projeto) {
            $cargoStr = $projeto->getNome() . " - ";
            $cargoStr .= $projeto->getResumo();
            if (!isNullOrEmpty($projeto->getUrl())) {
                $cargoStr .= " (" . $projeto->getUrl() . ")";
            }
            $cargoArray[] = $cargoStr;
        }
        return implode("; ", $cargoArray) . ".";
    }

    /**
     * @param ProjetoInfo $value
     * @return $this
     */
    public function adicionarProjeto($value) {
        if (isNullOrEmpty($value->getId())) {
            $value->setId(md5(uniqid()));
        }
        $this->projetos[$value->getId()] = $value;
        return $this;
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
     * @return $this
     */
    public function adicionarConhecimento($value) {
        if (isNullOrEmpty($value->getId())) {
            $value->setId(md5(uniqid()));
        }
        $this->conhecimentos[$value->getId()] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCargoAtual() {
        if (count($this->cargos) > 0) {
            /** @var CargoInfo $cargo */
            $cargo = array_values($this->cargos)[0];
            return $cargo->getNome();
        }
        return "";
    }

    /**
     * @param CurriculoInfo $curriculo
     * @param stdClass $value
     * @param string $language
     */
    public static function converterJsonParaCurriculo(CurriculoInfo &$curriculo, stdClass $value, $language = "pt_BR") {
        if (isset($value->base)) {
            $curriculo->setBase($value->base);
        }
        if (isset($value->nome)) {
            $curriculo->setNome(getStr($value->nome, $language));
        }
        if (isset($value->basico)) {
            $curriculo->setBasico(getStr($value->basico, $language));
        }
        if (isset($value->endereco)) {
            $curriculo->setEndereco(getStr($value->endereco, $language));
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
        if (isset($value->pretensao)) {
            $curriculo->setPretensao(getStr($value->pretensao, $language));
        }
        //if (isset($value->linguas) && count($value->linguas) > 0) {
        if (isset($value->linguas) && is_array($value->linguas)) {
            foreach ($value->linguas as $lingua) {
                $curriculo->adicionarIdioma( IdiomaInfo::fromJson($lingua, $language) );
            }
        }
        //if (isset($value->cursos) && count($value->cursos) > 0) {
        if (isset($value->conquistas) && is_array($value->conquistas)) {
            foreach ($value->conquistas as $conquista) {
                $curriculo->adicionarConquista( ConquistaInfo::fromJson($conquista, $language) );
            }
        }
        //if (isset($value->cargos) && count($value->cargos) > 0) {
        if (isset($value->cargos) && is_array($value->cargos)) {
            foreach ($value->cargos as $cargo) {
                $curriculo->adicionarCargo( CargoInfo::fromJson($cargo, $language) );
            }
        }
        //if (isset($value->projetos) && count($value->projetos) > 0) {
        if (isset($value->projetos) && is_array($value->projetos)) {
            foreach ($value->projetos as $projeto) {
                $curriculo->adicionarProjeto( ProjetoInfo::fromJson($projeto, $language) );
            }
        }
        //if (isset($value->conhecimentos) && count($value->conhecimentos) > 0) {
        if (isset($value->conhecimentos) && is_array($value->conhecimentos)) {
            foreach ($value->conhecimentos as $conhecimento) {
                $curriculo->adicionarConhecimento( ConhecimentoInfo::fromJson($conhecimento, $language) );
            }
        }
    }

    /**
     * @param stdClass $value
     * @param string $language
     * @return CurriculoInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $curriculo = new CurriculoInfo();
        CurriculoInfo::converterJsonParaCurriculo($curriculo, $value, $language);
        return $curriculo;
    }
}