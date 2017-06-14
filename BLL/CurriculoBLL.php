<?php

namespace Emagine\BLL;

use Emagine\Model\CurriculoInfo;

/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 14/06/2017
 * Time: 15:27
 */
class CurriculoBLL
{
    public function carregarJson($arquivo, $language = "pt_BR") {
        $fullPath = dirname( __DIR__ ) . "/Core/" . $arquivo;
        $json = file_get_contents( $fullPath );
        $curriculo = json_decode($json);
        return CurriculoInfo::fromJson($curriculo, $language);
    }
}