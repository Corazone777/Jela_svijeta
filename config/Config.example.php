<?php
namespace Config;

/**
 * Constants
 *
 * @package Config
 */
class Config
{
    /**
     * DB Connection
     *
     * @var string DBC = 'mysql:host=[hostname];dbname=[db_name];charset=UTF8'
     */
    public const DBC = '';

    /**
     * Name of the DB user
     *
     * @var string
     */
    public const DBUSER = '';

    /**
     * DB Password
     *
     * @var string
     */
    public const DBPASS = '';

    /**
     *Name of the database, add dot to the end
     * DBNAME = "example_name."
     * @var string
     */
    public const DBNAME = '';
}
