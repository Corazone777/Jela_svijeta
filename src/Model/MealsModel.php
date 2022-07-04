<?php
namespace App\Model;

use Config\Config;
use Lib\DBConnInterface;
use Lib\DiffTime;
use Lib\MetaData;
use Lib\ValidateUrl;
use PDO;

class MealsModel
{
    protected DBConnInterface $dbConnInterface;
    protected string $db = Config::DBNAME;

    public function __construct(DBConnInterface $dbConnInterface)
    {
        $this->dbConnInterface = $dbConnInterface;
    }

    /**
     * Get all meals from the database
     *
     * @param array $params
     *
     * @return array|null
     */
    public function selectMeals(array $params) : ?array
    {
        $locale = ValidateUrl::validate($params['lang']);
        $diffTime = DiffTime::formatDiffTime();

        $sql = "SELECT meals_id AS id, locale, title, description, status FROM "
             . $this->db . "meals_translations WHERE locale = :locale";

        if (!DiffTime::isValidDiffTime()) {
            $sql .= " AND status = 'created'";
        }

        if (DiffTime::isValidDiffTime()) {
            $sql .= " AND meals_translations.created_at BETWEEN " . "'" . $diffTime . "'"
                  . " AND NOW() "
                  . " OR locale = :locale "
                  . " AND meals_translations.updated_at BETWEEN " . "'" . $diffTime . "'" . " AND NOW() "
                  . " OR locale = :locale "
                  . " AND meals_translations.deleted_at BETWEEN" . "'" . $diffTime  . "'" . " AND NOW()";
        }

        if (isset($_GET['per_page'])) {
            $sql .= " LIMIT " . MetaData::showRows() . "," . MetaData::getPerPage();
        }

        //echo $sql;
        $pdo = $this->dbConnInterface->connect();
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':locale', $locale, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Return meal count
     *
     * @return int
     */
    public function mealsRowCount(): int
    {
        $locale = ValidateUrl::validate($_GET['lang']);
        $diffTime = DiffTime::formatDiffTime();

        $sql = "SELECT * FROM " . $this->db
             . "meals_translations WHERE locale = :locale";
        
        if (!DiffTime::isValidDiffTime()) {
            $sql .= " AND status = 'created'";
        }

        if (DiffTime::isValidDiffTime()) {
            $sql .= " AND meals_translations.created_at BETWEEN " . "'" . $diffTime . "'"
                  . " AND NOW() "
                  . " OR locale = :locale "
                  . " AND meals_translations.updated_at BETWEEN " . "'" . $diffTime . "'" . " AND NOW() "
                  . " OR locale = :locale "
                  . " AND meals_translations.deleted_at BETWEEN" . "'" . $diffTime  . "'" . " AND NOW()";
        }

        $pdo = $this->dbConnInterface->connect();
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':locale', $locale, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
