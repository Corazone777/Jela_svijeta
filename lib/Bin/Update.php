<?php
namespace Lib\Bin;

use Config\Config;
use Lib\DBConnInterface;
use Lib\Upload;

class Update
{
    protected DBConnInterface $dbConnInterface;
    protected Upload $upload;

    protected string $db;

    public function __construct(
        DBConnInterface $dbConnInterface,
        Upload $upload
    ) {
        $this->dbConnInterface = $dbConnInterface;
        $this->upload = $upload;
    }

    /**
     * Updating timestamps in meals table
     *
     * @var string $status updated_at or deleted_at
     *
     * @var int $id id of the meal to be updated
     *
     * @return void
     */
    public function updateStatus(string $status, int $id)
    {
        global $argv;
        $this->db = Config::DBNAME;

        if ($argv[1] == 'updated_at') {
            $currentStatus = 'modified';
        } else {
            $currentStatus = 'deleted';
        }

        $sql = "UPDATE " . $this->db . "meals_translations SET status = "
             . '"' . $currentStatus . '"' .  "," . $status . " = NOW() WHERE meals_id = " . $id;
        $pdo = $this->dbConnInterface->connect();
        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        $pdo = null;
    }
}
