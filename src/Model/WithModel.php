<?php

namespace App\Model;

use Config\Config;
use Lib\DBConnInterface;
use Lib\ValidateUrl;
use PDO;

class WithModel
{
    protected DBConnInterface $dbConnInterface;
    protected string $db = Config::DBNAME;

    public function __construct(DBConnInterface $dbConnInterface)
    {
        $this->dbConnInterface = $dbConnInterface;
    }

    /**
     * Return meals "with" passed values (ingredients, tags, category)
     *
     * @param array $params $_GET parameters
     *
     * @return array
     */
    public function selectWith(array $params) : ?array
    {
        $ctiTable = ValidateUrl::validate($params['cti_table']);
        $locale = ValidateUrl::validate($params['lang']);
        $id = ValidateUrl::validate($params['id']);

        $table = $ctiTable . "_translations";
        $sql = "SELECT " . $table . "." . $ctiTable . "_id AS id, ". $table . ".locale,"
             . $table . ".title," . $table . ".slug"
             . " FROM " . $table
             . " INNER JOIN meals_" . $ctiTable
             . " ON " . $table .  "." . $ctiTable . "_id = meals_" . $ctiTable . "."
             . $ctiTable . "_id"
             . " WHERE " . $table . ".locale = :locale"
             . " AND meals_" . $ctiTable . ".meal_id = " . $id;

        //print_r($sql);

        $pdo = $this->dbConnInterface->connect();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':locale', $locale, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
