<?php
namespace Lib;

class DiffTime
{

    /**
     * Validate diff_time parameter
     *
     * @return bool
     */
    public static function isValidDiffTime(): bool
    {
        if (isset($_GET['diff_time'])
            && (int) $_GET['diff_time'] <= 0
            || (int) $_GET['diff_time'] > time()
        ) {
            echo "Diff time cant be less than or equal to 0 or larger than 
                                                             current time()";
            return false;
        } elseif (!isset($_GET['diff_time'])) {
            return false;
        }

        return true;
    }

    public static function formatDiffTime(): string
    {
       $diffTime = $_GET['diff_time'];
       return gmdate("Y-m-d H:i:s", $diffTime);
    }
}
