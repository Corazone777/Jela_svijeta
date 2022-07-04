<?php

namespace App\Model;

use Config\Config;
use Lib\DBConnInterface;
use Lib\DiffTime;
use Lib\MetaData;
use Lib\ValidateUrl;
use PDO;

class CategoryModel
{
    protected DBConnInterface $dbConnInterface;
    protected string $db = Config::DBNAME;

    public function __construct(DBConnInterface $dbConnInterface)
    {
        $this->dbConnInterface = $dbConnInterface;
    }

    /**
     * Return all meals that have requested category @params['category_id']
     * on locale @params['lang']
     *
     * @param array $params $_GET parameters

     * @return array|null
     */
    public function selectCategory(array $params): ?array
    {
        $categoryId = ValidateUrl::validate($params['category_id']);
		$locale = ValidateUrl::validate($params['lang']);
        $diffTime = DiffTime::formatDiffTime();
        $sqlFilter = $this->db . " meals_category.category_id " . $categoryId
                   . " AND " . $this->db . "meals_translations.locale = :locale";

        $sql = "SELECT meals_id as id, title, description, status FROM "
             . $this->db . " meals_translations "
             . "INNER JOIN " . $this->db . "meals_category "
             . "ON meals_translations.meals_id = meals_category.meal_id "
             . "WHERE " . $sqlFilter;

        if (!DiffTime::isValidDiffTime()) {
            $sql .= " AND status = 'created'";
		}

        if (DiffTime::isValidDiffTime()) {
            $sql .= " AND meals_translations.created_at BETWEEN " . "'" . $diffTime . "'"
                  . " AND NOW() "
                  . " OR " . $sqlFilter
                  . " AND meals_translations.updated_at BETWEEN " . "'" . $diffTime . "'" .  " AND NOW() "
                  . " OR " . $sqlFilter
                  . " AND meals_translations.deleted_at BETWEEN " . "'" . $diffTime . "'" . " AND NOW()";
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
     * Return number of rows when "category" parameter is passed
     *
     * @return int
     */
    public function categoryRowCount(): int
    {
        $locale = ValidateUrl::validate($_GET['lang']);
        $categoryId = ValidateUrl::validate($_GET['category']);
        $diffTime = DiffTime::formatDiffTime();

        $sql = "SELECT * FROM " . $this->db . "meals_translations "
             . "INNER JOIN " . $this->db . "meals_category ON "
             . $this->db . "meals_translations.meals_id = " . $this->db
             .  "meals_category.meal_id "
             . "WHERE " . $this->db . "meals_translations.locale = :locale"
             . " AND " . $this->db . "meals_category.category_id ";

        if ($categoryId === "NULL") {
            $sql .= "IS NULL";
            $categoryId = "IS NULL";
        } elseif ($categoryId === "!NULL") {
            $sql .= "IS NOT NULL";
            $categoryId = "IS NOT NULL";
        } else {
            $sql .= "=" . $categoryId;
            $categoryId = "= " . $categoryId;
        }

        $sqlFilter = $this->db . " meals_category.category_id " . $categoryId
                   . " AND " . $this->db . "meals_translations.locale = :locale";

        if (!DiffTime::isValidDiffTime()) {
            $sql .= " AND status = 'created'";
        }

        if (DiffTime::isValidDiffTime()) {
            $sql .= " AND meals_translations.created_at BETWEEN " . "'" . $diffTime . "'"
                  . " AND NOW() "
                  . " OR " . $sqlFilter
                  . " AND meals_translations.updated_at BETWEEN " . "'" . $diffTime . "'" .  " AND NOW() "
                  . " OR " . $sqlFilter
                  . " AND meals_translations.deleted_at BETWEEN " . "'" . $diffTime . "'" . " AND NOW()";
        }


        //echo $sql;
        $pdo = $this->dbConnInterface->connect();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':locale', $locale, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }
}
