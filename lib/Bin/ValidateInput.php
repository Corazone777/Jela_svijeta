<?php
namespace Lib\Bin;

/**
 * Usage:
 * 1.) Meals, categories, tags and ingredients
 * => ./upload [table_name] [times]
 *
 * 3.) Translation tables -> meals_translations, tags_translations...
 * => ./upload [table_name] [id] [locale]
 *
 * 4.) Join Tables -> meals_tags, meals_ingredients, meals_category
 * => ./upload [table_name] [meal_id] [other_id]
 */
class ValidateInput
{
    public static array $error;
    public static array $validLocale = ['en_US', 'hr_HR', 'fr_FR'];
    public static array $validLangs = ['en', 'hr', 'fr'];

    /**
     * Validate values from the stdin
     *
     * @return bool
     */
    public static function validateValues() : bool
    {
        global $argc;
        global $argv;

        if ($argc <= 1) {
            self::$error[] = "There should be at least a table name" . "\n";
        }

        if ($argc >= 5) {
            self::$error[] = "Too many arguments, try with less" . "\n";
        }

        if (isset($argv[3])
            && $argv[2] === 'meals_translations'
        ) {
            for ($i = 0; $i < count(self::$validLangs); $i++) {
                if (self::$validLangs[$i] !== $argv[3]) {
                    self::$error[] = "Unsupported locale, try with hr, en, fr" ."\n";
                } else {
                    return true;
                }
            }
        }
        if (empty(self::$error)) {
            return true;
        } else {
            foreach (self::$error as $error) {
                echo $error;
            }
        }

        return false;
    }
}
