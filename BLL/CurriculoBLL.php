<?php

namespace Landim32\MyCareerProfile\BLL;

use FPDF;
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
     * @param string $arquivo
     * @param string $language
     * @return CurriculoInfo
     */
    public function carregarJson($arquivo, $language = "pt_BR") {
        $fullPath = dirname( __DIR__ ) . "/Json/" . $arquivo;
        $json = file_get_contents( $fullPath );
        $curriculo = json_decode($json);
        return CurriculoInfo::fromJson($curriculo, $language);
    }
}