<?php

namespace Landim32\MyCareerProfile\BLL;

use FPDF;
use Exception;
use Landim32\MyCareerProfile\Model\CurriculoInfo;

/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 14/06/2017
 * Time: 15:27
 */
class CurriculoBLL
{
    /**
     * @throws Exception
     * @param string $arquivo
     * @param string $language
     * @return CurriculoInfo
     */
    public function carregarJson($arquivo, $language = "pt_BR") {
        $arquivo = dirname( __DIR__ ) . "/Json/" . $arquivo;
        if (!file_exists($arquivo)) {
            throw new Exception(sprintf("Arquivo '%s' não encontrado.", $arquivo));
        }
        $originalJson = file_get_contents( $arquivo );
        $curriculoOriginalJson = json_decode($originalJson);
        $curriculo = new CurriculoInfo();
        CurriculoInfo::converterJsonParaCurriculo($curriculo, $curriculoOriginalJson, $language);
        if (!isNullOrEmpty($curriculo->getBase())) {
            $arquivoBase = dirname( __DIR__ ) . "/Json/" . $curriculo->getBase() . ".json";
            if (!file_exists($arquivoBase)) {
                throw new Exception(sprintf("Arquivo base '%s' não encontrado.", $arquivoBase));
            }
            $baseJson = file_get_contents( $arquivoBase );
            $curriculoBaseJson = json_decode($baseJson);
            $curriculo = new CurriculoInfo();
            CurriculoInfo::converterJsonParaCurriculo($curriculo, $curriculoBaseJson, $language);
            CurriculoInfo::converterJsonParaCurriculo($curriculo, $curriculoOriginalJson, $language);
        }
        return $curriculo;
    }
}