<?php
namespace Lib;

use Lib\ValidateUrl;

/**
 * Contains data related to number of pages, items per page, total items and links
 */
class MetaData
{
    /**
     * Return per_page number
     *
     * @return int
     */
    public static function getPerPage()
    {
        if (isset($_GET['per_page'])) {
            $perPage = ValidateUrl::validate($_GET['per_page']);
            return $perPage;
        }
    }

    /**
     * Return number of pages
     *
     * @return int
     */
    public static function showRows()
    {
        if (isset($_GET['page'])) {
            $page = ValidateUrl::validate($_GET['page']);
            $firstPage = ($page - 1) * self::getPerPage();

            return $firstPage;
        }

        return $firstPage = 0;
    }

    /**
     * Define and return Metadata given the total number of items
     * Sets and appends $_GET['page'] and $_GET['per_page'] parameters
     *
     * @param int $totalItems  Number of items, passed to display in totalItems
     *                         and to calculate total number of pag
     *
     * @return array $metaData Metadata to append
     */
    public static function parser(int $totalItems): array
    {
        $totalItems = (string) ($totalItems);
        $totalItems = ValidateUrl::validate($totalItems);

        $page = isset($_GET['page']) ? ValidateUrl::validate($_GET['page']) : "1";

        $perPage = isset($_GET['per_page']) ?
                   ValidateUrl::validate($_GET['per_page']) : $totalItems;

        $totalPages = ceil($totalItems / $perPage);

        //Page can't be negative
        if ($page < 1) {
            $page = 1;
        }

        return [
              'meta' => [
                  'currentPage' => $page,
                  'totalItems' => $totalItems,
                  'itemsPerPage'=> $perPage,
                  'totalPages'=> $totalPages
              ]
         ];
    }

    /**
     * Define and return links to different pages given the total number of items
     *
     * @param int $totalItems Number of total items per request
     *
     * @return array $links Links displayed at the end of the request
     */
    public static function getLinks(int $totalItems): array
    {
        $totalItems = (string) ($totalItems);
        $totalItems = ValidateUrl::validate($totalItems);

        $page = isset($_GET['page']) ? ValidateUrl::validate($_GET['page']) : "1";
        $perPage = isset($_GET['per_page']) ? ValidateUrl::validate($_GET['per_page']) : $totalItems;
        $totalPages = ceil($totalItems / $perPage);

        $fullLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $linkNull = "null";

        $urlArr[] = explode("&page=" . $page, $_SERVER["REQUEST_URI"]);

        //$urlArr[0][0] Part of the url up to $page parameter
        //$urlArr[0][1] Rest of the url beyond $page parameter
        $link = "http://$_SERVER[HTTP_HOST]" . $urlArr[0][0] . $urlArr[0][1] . "&page=";

        //Generating links
        if ($page >= $totalPages && $totalPages == 1) {
            $links = [
                'links' => [
                    'previous' => $linkNull,
                    'self' => $fullLink,
                    'next' => $linkNull,
                ]];
        } elseif (is_nan($totalPages)) {
            $links = [
                'links' => [
                    'previous' => $linkNull,
                    'self' => $fullLink,
                    'next' => $linkNull,
                ]
            ];
        } elseif ($page > $totalPages) {
            $links = [
                'links' => [
                    'previous' => $linkNull,
                    'self' => $fullLink,
                    'next' => $linkNull
                ]];
        } elseif ($page == $totalPages) {
            $links = [
                'links' => [
                    'previous' => $link . ($page - 1),
                    'self' => $fullLink,
                    'next' => $linkNull,
                ]
            ];
        } elseif ($page == 1) {
            $links = [
                'links' => [
                    'previous' => $linkNull,
                    'self' => $fullLink,
                    'next' => $link . ($page + 1),
                ]];
        } elseif ($page <= 0) {
            $links = [
                'links' => [
                    'previous' => $linkNull,
                    'self' => $link . ($page = 1),
                    'next' => $linkNull,
                ]];
        } else {
            $links = [
                'links' => [
                    'previous' => $link . ($page - 1),
                    'self' => $fullLink,
                    'next' => $link . ($page + 1),
                ]];
        }

        return $links;
    }
}
