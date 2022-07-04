<?php

namespace Lib;

use PDO;
use PDOException;
use Config\Config;

require_once 'DBConnInterface.php';

class SqlConnection implements DBConnInterface
{
    protected PDO $pdo;

    /**
     * Connect to the mysql databse
     *
     * @return null|PDO
     */
    public function connect(): ?PDO
    {
        try {
            $pdo = new PDO(Config::DBC, Config::DBUSER, Config::DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return null;
    }
}
