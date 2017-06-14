<?php

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
