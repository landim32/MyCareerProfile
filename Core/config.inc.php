<?php

/**
 * @param stdClass|string $value
 * @param string $language
 * @return string
 */
function getStr($value, $language = "pt_BR") {
    $str = "";
    if (isset($value)) {
        if (is_string($value)) {
            $str = $value;
        }
        elseif (is_object($value)) {
            if ($language == "pt_BR" && isset($value->pt_BR)) {
                $str = $value->pt_BR;
            }
            elseif ($language == "en" && isset($value->en)) {
                $str = $value->en;
            }
        }
    }
    return $str;
}

spl_autoload_register(function ($class) {
    $prefix = 'Emagine\\';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relativeClass = substr($class, $len);

    $codePath = dirname(__DIR__)."/".str_replace('\\', '/', $relativeClass).".php";
    if (file_exists($codePath)) {
        require_once $codePath;
    }
});
