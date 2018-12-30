<?php

if (array_key_exists("idioma", $_GET)) {
    define("IDIOMA", $_GET["idioma"]);
}
else {
    define("IDIOMA", "pt_BR");
}

if (!function_exists("_")) :
    function _($text) {
        return $text;
    }
endif;

if (function_exists('bindtextdomain')) {
    //clearstatcache();
    if (IDIOMA == 'pt_BR') {
        putenv('LC_ALL='.IDIOMA.'.utf8');
        //setlocale(LC_ALL, IDIOMA.'.utf8');
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    }
    else {
        putenv('LC_ALL='.IDIOMA);
        setlocale(LC_ALL, IDIOMA);
    }
    //var_dump(IDIOMA);
    if (IDIOMA != "en") {
        bindtextdomain('default', dirname(__DIR__).'/locale');
        bind_textdomain_codeset('default', 'UTF-8');
        textdomain('default');
    }
}