<?php
namespace App\Model;

use Lib\DBConnInterface;
use Lib\ValidateUrl;
use Lib\MetaData;
use Lib\DiffTime;
use PDO;

class TagsCategoryModel
{
    protected DBConnInterface $dbConnInterface;

    public function __construct(DBConnInterface $dBConnInterface)
    {
        $this->dbConnInterface = $dBConnInterface;
    }


    /**
     * Return meals when category and tags parameters are passed
     * @param array $params
     *
     * @return array
     */
    public function selectTagsCategory(array $params): array
    {
        $categoryID = ValidateUrl::validate($params['categoryID']);
        $tagsID = ValidateUrl::validate($_GET['tags']);
        $tagsIDCount = preg_match_all('!\d+!', $tagsID);
        $locale = ValidateUrl::validate($params['lang']);
        $diffTime = DiffTime::formatDiffTime();
        $sqlFilter = " meals_category.category_id " . $categoryID . " AND meals_tags.tags_id IN (". $tagsID .") AND locale = :locale";

        $sql = "SELECT meals_translations.meals_id AS id, meals_translations.title, 
                meals_translations.description, meals_translations.status "
             . "FROM meals_translations "
             . "INNER JOIN meals_category "
             . "ON  meals_category.meal_id = meals_translations.meals_id "
             . "INNER JOIN meals_tags "
             . "ON meals_translations.meals_id = meals_tags.meal_id "
             . "WHERE meals_category.category_id " . $categoryID
             . " AND meals_tags.tags_id IN (" . $tagsID . ") "
             . "AND locale = :locale ";

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

        $sql .= "GROUP BY meals_translations.meals_id, meals_translations.title,
                meals_translations.description, meals_translations.status HAVING COUNT(meals_tags.meal_id) = :tagsIDCount";


        if (isset($_GET['per_page'])) {
            $sql .= " LIMIT " . MetaData::showRows() . "," . MetaData::getPerPage();
        }

        //print_r($sql);

        $pdo = $this->dbConnInterface->connect();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':locale', $locale, PDO::PARAM_STR);
        $stmt->bindParam(':tagsIDCount', $tagsIDCount, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Return meal count when category and tags parameters are passed
     *
     * @return int
     */
    public function tagsCategoryCount(): int
    {
        $locale = ValidateUrl::validate($_GET['lang']);
        $categoryID = ValidateUrl::validate($_GET['category']);
        $tagsID = ValidateUrl::validate($_GET['tags']);
        $tagsIDCount = preg_match_all('!\d+!', $tagsID);
        $diffTime = DiffTime::formatDiffTime();

        $sql = "SELECT * "
             . "FROM meals_translations "
             . "INNER JOIN meals_category "
             . "ON meals_category.meal_id = meals_translations.meals_id "
             . "INNER JOIN meals_tags "
             . "ON meals_translations.meals_id = meals_tags.meal_id "
             . "WHERE meals_category.category_id  ";

        $sql1 = " AND  meals_tags.tags_id IN (" . $tagsID . ") "
              . " AND locale = :locale";

        if ($_GET['category'] === "NULL") {
            $sql .= "IS NULL " . $sql1;
            $categoryID = "IS NULL";
        } elseif ($_GET['category'] === "!NULL") {
            $sql .= "IS NOT NULL " . $sql1;
            $categoryID = "IS NOT NULL";
        } else {
            $sql .= "= " . $categoryID . $sql1;
            $categoryID = "= " . $categoryID;
        }

        $sqlFilter = " meals_category.category_id " . $categoryID . " AND meals_tags.tags_id IN (". $tagsID .") AND locale = :locale";

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

        $sql .= " GROUP BY meals_translations.meals_id, meals_translations.title,
                  meals_translations.description, meals_translations.status HAVING COUNT(meals_tags.meal_id) = :tagsIDCount";

        //echo $sql;

        $pdo = $this->dbConnInterface->connect();
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':locale', $locale, PDO::PARAM_STR);
        $stmt->bindParam(':tagsIDCount', $tagsIDCount, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount(PDO::FETCH_ASSOC);
    }
}
