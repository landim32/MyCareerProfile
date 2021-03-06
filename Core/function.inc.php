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

/**
 * @param string|null $texto
 * @return bool
 */
function isNullOrEmpty($texto) {
    return (is_null($texto) || $texto == '');
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param int $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param bool $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source https://gravatar.com/site/implement/images/php/
 */
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

function str_lreplace($search, $replace, $subject)
{
    $pos = strrpos($subject, $search);

    if($pos !== false)
    {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    return $subject;
}

spl_autoload_register(function ($class) {
    $prefix = 'Landim32\\MyCareerProfile\\';

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