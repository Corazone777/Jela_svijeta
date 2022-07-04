<?php
namespace Lib\Bin;

//Suppress all warning and notices
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

use Lib\Tables;

require_once __DIR__ . '/../../vendor/autoload.php';

class RunInsert
{
    protected InsertMainValues $mainValues;
    protected InsertTranslations $translations;
    protected InsertJoins $insertJoins;
    protected Update $update;

    protected array $updateValues = ['updated_at', 'deleted_at'];

    public function __construct(
        InsertMainValues $mainValues,
        InsertTranslations $translations,
        InsertJoins $insertJoins,
        Update $update
    ) {
        $this->mainValues = $mainValues;
        $this->translations = $translations;
        $this->insertJoins = $insertJoins;
        $this->update = $update;
    }

    /**
     * Insert into the database depending on the table name
     *
     * @var array $argv
     *
     * @return void
     */
    public function runInsert(array $argv)
    {
        if (!ValidateInput::validateValues()) {
            return;
        }

        for ($i = 0; $i < count(Tables::$tables); $i++) {
            if ($argv[1] === Tables::$tables['main'][$i]) {
                $this->mainValues->insertMainValues($argv[1], $argv[2]);
                echo "Values inserted into " . $argv[1] . " table" . "\n";
                return;
            } elseif ($argv[1] === Tables::$tables['translations'][$i]) {
                $this->translations->insertTranslations($argv);
                echo "Values inserted into " . $argv[1] . " table" . "\n";
                return;
            } elseif ($argv[1] === $this->updateValues[$i]) {
                //$this->update->updateTimestamps($argv[1], $argv[2]);
                $this->update->updateStatus($argv[1], $argv[2]);
                echo "Status updated" . "\n";
                return;
            } elseif ($argv[1] === Tables::$tables['joins'][$i]) {
                $this->insertJoins->insertJoins($argv);
                echo "Values " . $argv[2] . " " . $argv[3] . " inserted into " . $argv[1] . " table" . "\n";
                return;
            }
        }
        echo "Error! Provide a valid table name" . "\n";
    }
}
