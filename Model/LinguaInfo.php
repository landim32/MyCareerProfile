<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 14/06/2017
 * Time: 15:03
 */

namespace Landim32\MyCareerProfile\Model;

use stdClass;

class LinguaInfo
{
    const NATIVO = "nativo";
    const AVANCADO = "avançado";

    private $nome;
    private $tipo;

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
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * @return string
     */
    public function getTipoStr() {
        $str = "";
        switch ($this->tipo){
            case LinguaInfo::NATIVO:
                $str = _("Native");
                break;
            case LinguaInfo::AVANCADO:
                $str = _("Advanced");
                break;
        }
        return $str;
    }

    /**
     * @param string $value
     */
    public function setTipo($value) {
        $this->tipo = $value;
    }

    /**
     * @param stdClass $value
     * @param string $language
     * @return LinguaInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $lingua = new LinguaInfo();
        if (isset($value->nome)) {
            $lingua->setNome(getStr($value->nome, $language));
        }
        if (isset($value->tipo)) {
            $lingua->setTipo(getStr($value->tipo, $language));
        }
        return $lingua;
    }
}