<?php
namespace Lib;

/**
 * URL validation
 */
class ValidateUrl
{
    public static array $validParams = [
        'lang',
        'category',
        'tags',
        'with',
        'per_page',
        'page',
        'diff_time'
    ];

    /**
     * Validate URL
     *
     * @param string|null $url Page url
     *
     * @return string
     */
    public static function validate(?string $url): string
    {
        $url = trim($url);
        $url = htmlspecialchars($url);

        return $url;
    }

    /**
     * If requested parameters are valid return true
     *
     * @return bool
     */
    public static function areValidParams(): bool
    {
        foreach ($_GET as $key => $v) {
            if (!in_array($key, self::$validParams)) {
                header("HTTP/1.0 404 Not Found");
                die("404 Not Found");
            }
        }
        return true;
    }

    /**
     * If requested url is valid return true
     *
     * @return bool
     */
    public static function isValidUrl(): bool
    {
        if (self::areValidParams()
            && in_array($_GET['lang'], Languages::$langs)
        ) {
            return true;
        }
        return false;
    }
}
