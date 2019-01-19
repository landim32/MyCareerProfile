<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 19/01/2019
 * Time: 12:43
 */

namespace Landim32\MyCareerProfile\Utils;

use Landim32\MyCareerProfile\Model\CurriculoInfo;
use Landim32\MyCareerProfile\Model\CursoInfo;
use Landim32\MyCareerProfile\Model\IdiomaInfo;

class CurriculoUtils
{
    /**
     * @return CurriculoInfo
     */
    public function gerar() {
        return $this->gerarIdioma(
            $this->gerarCurso(
                CurriculoUtils::gerarBase()
            )
        );
    }

    /**
     * @return string
     */
    protected function gerarResumo() {
        return
            "Desenvolvedor FullStack com mais vinte anos de experiência. Atualmente desenvolvo " .
            "aplicativos para dispositivos móveis Android, iOS e Windows Phone. CEO da Emagine.com.br, " .
            "criador da plataforma Imobsync.com.br (gestão imobiliária), desenvolvedor do portal Wimóveis. " .
            "Conhecimentos em Xamarin, Titanium, Android, Swift, React Native, PHP, C#.Net, entre outros. " .
            "Certificado pela Microsoft #B252-4585.";
    }

    /**
     * @return CurriculoInfo
     */
    protected function gerarBase() {
        return (new CurriculoInfo())
            ->setNome("Rodrigo Landim")
            ->setEmail1("rodrigo@emagine.com.br")
            ->setNome("Rodrigo Landim")
            ->setTelefone1("+55 (62) 9 8464 6330")
            ->setWebsite("emagine.com.br")
            ->setGithub("landim32")
            ->setLinkedin("rodrigolandim")
            ->setTwitter("landim32oficial")
            ->setVimeo("landim32")
            ->setResumo($this->gerarResumo());
    }

    /**
     * @param CurriculoInfo $curriculo
     * @return CurriculoInfo
     */
    protected function gerarCurso(CurriculoInfo $curriculo) {
        return $curriculo->adicionarCurso((new CursoInfo())
            ->setId("mcp")
            ->setCurso("MCP #B252-4585")
            ->setInstituicao("Microsoft")
            ->setTipo(CursoInfo::CERTIFICACAO)
        );
    }

    /**
     * @param CurriculoInfo $curriculo
     * @return CurriculoInfo
     */
    protected function gerarIdioma(CurriculoInfo $curriculo) {
        return $curriculo
            ->adicionarIdioma((new IdiomaInfo())
                ->setId("portugues")
                ->setNome("Portuguese")
                ->setTipo(IdiomaInfo::NATIVO)
            )->adicionarIdioma((new IdiomaInfo())
                ->setId("ingles")
                ->setNome("Inglês")
                ->setTipo(IdiomaInfo::AVANCADO)
            );
    }
}