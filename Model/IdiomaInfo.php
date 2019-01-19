<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 14/06/2017
 * Time: 15:03
 */

namespace Landim32\MyCareerProfile\Model;

use stdClass;

class IdiomaInfo
{
    const NATIVO = "nativo";
    const AVANCADO = "avançado";

    private $id;
    private $nome;
    private $tipo;

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
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * @return string
     */
    public function getTipoStr() {
        $str = "";
        switch ($this->tipo){
            case IdiomaInfo::NATIVO:
                $str = _("Native");
                break;
            case IdiomaInfo::AVANCADO:
                $str = _("Advanced");
                break;
        }
        return $str;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTipo($value) {
        $this->tipo = $value;
        return $this;
    }

    /**
     * @param stdClass $value
     * @param string $language
     * @return IdiomaInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $lingua = new IdiomaInfo();
        if (isset($value->id)) {
            $lingua->setId($value->id);
        }
        if (isset($value->nome)) {
            $lingua->setNome(getStr($value->nome, $language));
        }
        if (isset($value->tipo)) {
            $lingua->setTipo(getStr($value->tipo, $language));
        }
        return $lingua;
    }
}