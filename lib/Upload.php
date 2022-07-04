<?php
namespace Lib;

use Config\Config;

/**
 * Upload data into the database from the stdin
 */
class Upload
{
    protected DBConnInterface  $dbConnInterface;

    public function __construct(DBConnInterface $dBConnInterface)
    {
        $this->dbConnInterface = $dBConnInterface;
    }

    /**
     * Insert into the database
     *
     * @var array $params Parameters to pass
     *
     * @var $params['db_table']
     * Name of the table to insert data
     *
     * @var $params['columns']
     * Names of the columns to be affected
     *
     * @var $params['values']
     * Values to be inserted into specified columns
     *
     * @return string $sql
     */
    public function insert(array $params): string
    {
        $db = Config::DBNAME;
        $table = $db . $params['db_table'];

        $sql = "INSERT INTO " . $table . " (";

        //appending columns to the SQL statement
        foreach ($params['columns'] as $column) {
            $sql .= $column . ", ";
        }

        //removing comas from the last element in the array
        $sql = rtrim($sql, ", ");
        $sql .= ") VALUES (";

        //adding values to prepare, same name as columns -> ('title'...)
        //VALUES (':title'...)
        foreach ($params['columns'] as $values) {
            $sql .= ":" . $values . ", ";
        }

        $sql = rtrim($sql, ", ");
        $sql .= ");";

        $pdo = $this->dbConnInterface->connect();
        $stmt = $pdo->prepare($sql);

        for ($i = 0; $i < count($params['columns']); $i++) {
            $stmt->bindValue($params['columns'][$i], $params['values'][$i]);
        }

        $stmt->execute();
        $pdo = null;

        return $sql;
    }
}
