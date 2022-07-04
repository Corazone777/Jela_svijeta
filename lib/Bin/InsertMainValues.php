<?php
namespace Lib\Bin;

use Lib\DBConnInterface;
use Lib\Upload;

/**
 * Data for inserting into meals, categories, tags and ingredients table
 */
class InsertMainValues
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
     *  Insert values into the main tables
     *
     * @return void
     *
     * @var string $tableName name of the main table
     *
     * @var int|null $times Number of times to insert into the db
     *
     * @var null|int $times number of times to insert data
     */
    public function insertMainValues(string $tableName, ?int $times)
    {
        $times = $times ?? 1;

        switch ($tableName) {
        case 'meals':
        case 'tags':
        case 'ingredients':
        case 'categories':
            for ($i = 0; $i < $times; $i++) {
                $this->upload->insert(['db_table' => $tableName]);
            }
            break;
        default:
                echo "Provide a valid table name";
        }
    }
}
