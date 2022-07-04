<?php
namespace Lib;

/**
 * Languages in the database and faker languages
 */

class Languages
{
    /**
     * Supported languages
     *
     * @var array $langs
     */
    public static array $langs = ['en', 'hr', 'fr'];

    /**
     * Languages for translating meals,categories...
     *
     * @var array $fakerLangs
     */
    public static array $fakerLangs = ['eng_US', 'hr_HR', 'fr_FR'];
}
