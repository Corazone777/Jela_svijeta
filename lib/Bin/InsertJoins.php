<?php
namespace Lib\Bin;

use Lib\DBConnInterface;
use Lib\Tables;
use Lib\Upload;

class InsertJoins
{
    protected DBConnInterface  $dbConnInterface;
    protected Upload $upload;

    public function __construct(
        DBConnInterface $dbConnInterface,
        Upload $upload
    ) {
        $this->dbConnInterface = $dbConnInterface;
        $this->upload = $upload;
    }

    /**
     * Insert data into 'joins' table
     *
     * @param array $params $argv values
     *
     * @return void
     */
    public function insertJoins(array $params)
    {
        $tableName = $params[1];
        $idValues = [$params[2], $params[3]];

        switch ($tableName) {
            case "meals_category":
                $this->upload->insert(
                    [
                       'db_table' => $tableName,
                       'columns' => Tables::$columns['meals_category'],
                       'values' => $idValues,
                    ],
                );
                break;
            case "meals_tags":
                $this->upload->insert(
                    [
                       'db_table' => $tableName,
                       'columns' => Tables::$columns['meals_tags'],
                       'values' => $idValues,
                    ],
                );
                break;

            case "meals_ingredients":
                $this->upload->insert(
                    [
                       'db_table' => $tableName,
                       'columns' => Tables::$columns['meals_ingredients'],
                       'values' => $idValues,
                    ],
                );
        }
    }
}
