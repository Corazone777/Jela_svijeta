<?php
namespace App\Model;

use Config\Config;
use Lib\DBConnInterface;
use Lib\DiffTime;
use Lib\MetaData;
use Lib\ValidateUrl;
use PDO;

class TagsModel
{
    protected DBConnInterface $dbConnInterface;
    protected string $db = Config::DBNAME;

    public function __construct(DBConnInterface $dbConnInterface)
    {
        $this->dbConnInterface = $dbConnInterface;
    }

    /**
     * Return all meals with requested tags
     * @param array $params
     *
     * @return array
     */
    public function selectTags(array $params): array
    {
        $id = ValidateUrl::validate($params['tags']);
        $idCount = preg_match_all('!\d+!', $id);
        $locale = ValidateUrl::validate($_GET['lang']);
        $diffTime = DiffTime::formatDiffTime();
        $sqlFilter = $this->db . "meals_tags.tags_id IN (" . $id . ") AND " . $this->db . "meals_translations.locale = :locale";


        $sql = "SELECT meal_id as id, title, description, status "
             . "FROM " . $this->db . "meals_translations "
             . "INNER JOIN " . $this->db . "meals_tags "
             . "ON meals_translations.meals_id = meals_tags.meal_id "
             . "WHERE " . $sqlFilter;
             
        //print_r($sql);
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
                meals_translations.description, meals_translations.status HAVING COUNT(meals_tags.meal_id) = :idCount";

        if (isset($_GET['per_page'])) {
            $sql .= " LIMIT " . MetaData::showRows() . "," . MetaData::getPerPage();
        }
        
        //echo $sql;
        $pdo = $this->dbConnInterface->connect();
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':idCount', $idCount, PDO::PARAM_INT);
        $stmt->bindParam(':locale', $locale, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Return number of rows when "tags" parameter is passed
     *
     * @return int
     */
    public function tagsRowCount(): int
    {
        $id = ValidateUrl::validate($_GET['tags']);
        $idCount = preg_match_all('!\d+!', $id);
        $locale = ValidateUrl::validate($_GET['lang']);
        $sqlFilter = $this->db . "meals_tags.tags_id IN (" . $id . ") AND " . $this->db . "meals_translations.locale = :locale";
        $diffTime = DiffTime::formatDiffTime();

        $sql = "SELECT * FROM " . $this->db . "meals_translations "
             . "INNER JOIN " . $this->db . "meals_tags "
             . "ON meals_translations.meals_id = meals_tags.meal_id "
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

        $sql .= " GROUP BY meals_translations.meals_id, meals_translations.title,
                meals_translations.description, meals_translations.status HAVING COUNT(meals_tags.meal_id) = :idCount";

        $pdo = $this->dbConnInterface->connect();
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':idCount', $idCount, PDO::PARAM_INT);
        $stmt->bindParam(':locale', $locale, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->rowCount();
    }
}
