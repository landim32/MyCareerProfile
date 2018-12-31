<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 14/06/2017
 * Time: 14:38
 */

namespace Landim32\MyCareerProfile\Model;

use stdClass;

class LinkInfo
{
    const WEBSITE = "website";
    const ANDROID = "android";
    const IOS = "ios";
    const VIDEO = "video";

    private $nome;
    private $tipo;
    private $url;

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
     * @param string $value
     */
    public function setTipo($value) {
        $this->tipo = $value;
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
     * @param stdClass $value
     * @param string $language
     * @return LinkInfo
     */
    public static function fromJson($value, $language = "pt_BR") {
        $link = new LinkInfo();
        if (isset($value->nome)) {
            $link->setNome(getStr($value->nome, $language));
        }
        if (isset($value->nome)) {
            $link->setTipo(getStr($value->tipo, $language));
        }
        if (isset($value->url)) {
            $link->setUrl(getStr($value->url, $language));
        }
        return $link;
    }
}