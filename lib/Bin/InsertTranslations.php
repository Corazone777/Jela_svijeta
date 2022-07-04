<?php
namespace Lib\Bin;

use Faker;
use Lib\DBConnInterface;
use Lib\Tables;
use Lib\Upload;

require_once __DIR__ . '/../../vendor/autoload.php';

/**
 * Data for inserting values into translation tables
 */
class InsertTranslations
{
    protected DBConnInterface $dbConnInterface;
    protected Upload $upload;

    public function __construct(
        DBConnInterface $dBConnInterface,
        Upload $upload
    ) {
        $this->dbConnInterface = $dBConnInterface;
        $this->upload = $upload;
    }

    /**
     * Insert data into translation tables, accepts values from stdin,
     * $params[n] is the nth value of $argv
     *
     * @param array $params $params['db_table'], $params['columns'],
     *                      $params['values']
     *
     * @return void
     */
    public function insertTranslations(array $params)
    {
        $tableName = $params[1];
        $mainTableId = $params[2];
        $locale = $params[3];

        $fakerLocale = "";

        //Change locale to fakerLocale => en to en_US
        for ($i = 0; $i < count(ValidateInput::$validLangs); $i++) {
            if ($locale == ValidateInput::$validLangs[$i]) {
                $fakerLocale = ValidateInput::$validLocale[$i];
            }
        }

        $faker = Faker\Factory::create($fakerLocale);

        switch ($tableName) {
            case 'category_translations':
                $title = $faker->city;
                $this->upload->insert(
                    [
                        'db_table' => $tableName,
                        'columns'  => Tables::$columns['category_translations'],
                        'values'   => [
                            $mainTableId,
                            $locale,
                            $title,
                            strtolower($title)
                        ],
                    ],
                );
                break;
            case 'ingredients_translations':
                $title = $faker->country;
                $this->upload->insert(
                    [
                        'db_table' => $tableName,
                        'columns'  => Tables::$columns['ingredients_translation'],
                        'values'   => [
                            $mainTableId,
                            $locale,
                            $title,
                            strtolower($title)
                        ],
                    ],
                );
                break;
            case 'tags_translations':
                $title = $faker->company;
                $this->upload->insert(
                    [
                        'db_table' => $tableName,
                        'columns'  => Tables::$columns['tags_translations'],
                        'values'   => [
                            $mainTableId,
                            $locale,
                            $title,
                            strtolower($title),
                        ],
                    ],
                );
                break;
            case 'meals_translations':
                $this->upload->insert(
                    [
                        'db_table' => $tableName,
                        'columns'  => Tables::$columns['meals_translations'],
                        'values'   => [
                            $mainTableId,
                            $locale,
                            $faker->name,
                            $faker->address
                        ],
                    ]
                );
                break;
            default:
                echo "Provide a valid table name";
        }
    }
}
